<?php

$contacts = [];

// Function to add a contact to the contacts array
function addContact($name, $email, $phone)
{
    global $contacts;
    $contacts[] = [
        'name' => $name,
        'email' => $email,
        'phone' => $phone
    ];
}

// Function to display all contacts
function displayContacts()
{
    global $contacts;
    if (empty($contacts)) {
        echo "No contacts found.\n";
        return;
    }
    foreach ($contacts as $index => $contact) {
        echo ($index + 1) . ". Name: " . $contact['name'] . ", Email: " . $contact['email'] . ", Phone: " . $contact['phone'] . "\n";
    }
}

/**
 * This is a simple contact management application that allows users to add and display contacts. 
 * The contacts are stored in an array, and the user can interact with the application through a command-line interface. 
 * The user can choose to add a new contact, display all contacts, or exit the application. Each contact consists of a name, 
 * email, and phone number.
 */

while (true) {
    echo "Contact Management App\n";
    echo "1. Add Contact\n";
    echo "2. Display Contacts\n";
    echo "3. Exit\n";
    $choice = readline("Enter your choice: ");

    switch ($choice) {
        case 1:
            $name = readline("Enter name: ");
            $email = readline("Enter email: ");
            $phone = readline("Enter phone: ");
            addContact($name, $email, $phone);
            echo "Contact added successfully!\n";
            break;
        case 2:
            displayContacts();
            break;
        case 3:
            echo "Exiting the application. Goodbye!\n";
            exit(0);
        default:
            echo "Invalid choice. Please try again.\n";
    }
}