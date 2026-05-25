<?php

class ContactManager
{
    private string $storageFile = 'contacts.json';
    private array $contacts = [];

    public function __construct()
    {
        $this->loadContacts();
    }

    // Load contacts from JSON file
    private function loadContacts(): void
    {
        if (file_exists($this->storageFile)) {
            $json = file_get_contents($this->storageFile);
            $this->contacts = json_decode($json, true) ?? [];
        } else {
            $this->contacts = [];
        }
    }

    // Save contacts to JSON file
    private function saveContacts(): void
    {
        file_put_contents($this->storageFile, json_encode($this->contacts, JSON_PRETTY_PRINT));
    }

    // Validate email format
    private function isValidEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    // Validate phone (simple: non‑empty, digits, spaces, +, -)
    private function isValidPhone(string $phone): bool
    {
        return preg_match('/^[\+\d\s\-\(\)]+$/', $phone) && strlen($phone) >= 6;
    }

    // Add a new contact
    public function addContact(string $name, string $email, string $phone): bool
    {
        $name = trim($name);
        $email = trim($email);
        $phone = trim($phone);

        if (empty($name) || empty($email) || empty($phone)) {
            echo "Error: All fields are required.\n";
            return false;
        }
        if (!$this->isValidEmail($email)) {
            echo "Error: Invalid email format.\n";
            return false;
        }
        if (!$this->isValidPhone($phone)) {
            echo "Error: Phone must be at least 6 digits and contain only +, digits, spaces, hyphens, or parentheses.\n";
            return false;
        }
        // Check for duplicate email
        foreach ($this->contacts as $contact) {
            if ($contact['email'] === $email) {
                echo "Error: A contact with this email already exists.\n";
                return false;
            }
        }

        $this->contacts[] = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone
        ];
        $this->saveContacts();
        return true;
    }

    // Display all contacts with numbered list
    public function displayAll(): void
    {
        if (empty($this->contacts)) {
            echo "No contacts found.\n";
            return;
        }

        echo "\n--- Contact List ---\n";
        foreach ($this->contacts as $index => $c) {
            printf("%d. %s | %s | %s\n", $index + 1, $c['name'], $c['email'], $c['phone']);
        }
        echo "-------------------\n";
    }

    // Edit a contact by its list index (1‑based)
    public function editContact(int $index, string $name, string $email, string $phone): bool
    {
        if (!isset($this->contacts[$index])) {
            echo "Error: Contact not found.\n";
            return false;
        }

        $name = trim($name);
        $email = trim($email);
        $phone = trim($phone);

        if (empty($name) || empty($email) || empty($phone)) {
            echo "Error: All fields must be filled.\n";
            return false;
        }
        if (!$this->isValidEmail($email)) {
            echo "Error: Invalid email format.\n";
            return false;
        }
        if (!$this->isValidPhone($phone)) {
            echo "Error: Invalid phone format.\n";
            return false;
        }

        // Check that email is not used by another contact
        foreach ($this->contacts as $i => $c) {
            if ($i !== $index && $c['email'] === $email) {
                echo "Error: Another contact already has this email.\n";
                return false;
            }
        }

        $this->contacts[$index] = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone
        ];
        $this->saveContacts();
        return true;
    }

    // Delete a contact by its list index (1‑based)
    public function deleteContact(int $index): bool
    {
        if (!isset($this->contacts[$index])) {
            echo "Error: Contact not found.\n";
            return false;
        }
        array_splice($this->contacts, $index, 1);
        $this->saveContacts();
        return true;
    }

    // Search contacts by name or email (case‑insensitive)
    public function search(string $query): void
    {
        $query = strtolower(trim($query));
        if ($query === '') {
            echo "Search term cannot be empty.\n";
            return;
        }

        $results = [];
        foreach ($this->contacts as $c) {
            if (
                strpos(strtolower($c['name']), $query) !== false ||
                strpos(strtolower($c['email']), $query) !== false
            ) {
                $results[] = $c;
            }
        }

        if (empty($results)) {
            echo "No matching contacts found.\n";
        } else {
            echo "\n--- Search Results ---\n";
            foreach ($results as $c) {
                echo "Name: {$c['name']} | Email: {$c['email']} | Phone: {$c['phone']}\n";
            }
            echo "----------------------\n";
        }
    }
}

// ---------- CLI Menu ----------
$manager = new ContactManager();

while (true) {
    echo "\n=== Contact Management App ===\n";
    echo "1. Add Contact\n";
    echo "2. View All Contacts\n";
    echo "3. Edit Contact\n";
    echo "4. Delete Contact\n";
    echo "5. Search Contacts\n";
    echo "6. Exit\n";
    $choice = readline("Choose option: ");

    switch ($choice) {
        case '1':
            $name = readline("Name: ");
            $email = readline("Email: ");
            $phone = readline("Phone: ");
            if ($manager->addContact($name, $email, $phone)) {
                echo "Contact added successfully.\n";
            }
            break;

        case '2':
            $manager->displayAll();
            break;

        case '3':
            $manager->displayAll();
            $index = readline("Enter the number of the contact to edit: ");
            if (!is_numeric($index)) {
                echo "Invalid number.\n";
                break;
            }
            $index = (int) $index - 1; // convert to zero‑based
            $name = readline("New name: ");
            $email = readline("New email: ");
            $phone = readline("New phone: ");
            if ($manager->editContact($index, $name, $email, $phone)) {
                echo "Contact updated.\n";
            }
            break;

        case '4':
            $manager->displayAll();
            $index = readline("Enter the number of the contact to delete: ");
            if (!is_numeric($index)) {
                echo "Invalid number.\n";
                break;
            }
            $index = (int) $index - 1;
            if ($manager->deleteContact($index)) {
                echo "Contact deleted.\n";
            }
            break;

        case '5':
            $query = readline("Enter name or email to search: ");
            $manager->search($query);
            break;

        case '6':
            echo "Goodbye!\n";
            exit(0);

        default:
            echo "Invalid choice. Please enter 1-6.\n";
    }
}