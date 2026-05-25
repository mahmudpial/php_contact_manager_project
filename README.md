# 📇 PHP Contact Management Apps

This repository contains two PHP command-line contact management applications — a **simple procedural version** and an **enhanced object-oriented version** with persistent storage, CRUD operations, validation, and JSON-based data storage.

Both projects are designed for beginners who want to practice core PHP concepts before moving into advanced frameworks like Laravel and frontend technologies such as Vue.js.

---

# 📁 Project Structure

```bash
├── contact_manager.php                 # Simple procedural CLI version
├── contacts.json                       # Auto-generated JSON storage file
└── contact_manager/
    └── contact_manager.php             # Advanced OOP CLI application
```

> The original beginner-friendly version is located in the root directory, while the enhanced object-oriented version is inside the `contact_manager/` folder.

---

# 📄 Version 1 — Simple CLI App

## 📌 File

`contact_manager.php`

## 🧠 Concepts Used

- Procedural PHP
- Functions
- Arrays & associative arrays
- Global variables
- Loops & conditionals
- `readline()` for user input

## ✅ Features

- Add contacts
- Display contact list
- Simple CLI menu system
- Beginner-friendly structure

## ❌ Limitations

- No persistent storage
- No validation
- No edit/delete functionality
- Uses `global` variables
- Data disappears after exiting program

---

# 📄 Version 2 — Advanced OOP Contact Manager

## 📌 File

`contact_manager/contact_manager.php`

## 🧠 Concepts Used

- Object-Oriented Programming (OOP)
- Classes & methods
- JSON file storage
- CRUD operations
- Input validation
- File handling
- Search functionality
- Error handling

---

# ✨ Features (Advanced Version)

| Feature              | Description                            |
| -------------------- | -------------------------------------- |
| Persistent Storage   | Contacts saved into `contacts.json`    |
| OOP Design           | Clean `ContactManager` class structure |
| Add Contacts         | Store name, email, and phone           |
| View Contacts        | Display formatted contact list         |
| Edit Contacts        | Update existing contact information    |
| Delete Contacts      | Remove contacts easily                 |
| Search Contacts      | Search by name or email                |
| Validation           | Email & phone validation               |
| Duplicate Prevention | Prevents duplicate emails              |
| Error Handling       | User-friendly messages                 |
| Auto Save            | Changes instantly saved                |
| Clean CLI Output     | Numbered and formatted display         |

---

# 🔒 Validation Features

## 📧 Email Validation

Uses PHP built-in:

```php
FILTER_VALIDATE_EMAIL
```

## 📱 Phone Validation

Supports formats like:

```text
+1234567890
123-456-7890
(123) 456-7890
+1 555 123 4567
```

Validation allows:

- Numbers
- Spaces
- `+`
- `-`
- Parentheses

---

# 🧪 Example Interaction

```text
=== Contact Management App ===

1. Add Contact
2. View All Contacts
3. Edit Contact
4. Delete Contact
5. Search Contacts
6. Exit

Choose option: 1

Name: John Doe
Email: john@example.com
Phone: +1 555 123 4567

Contact added successfully.
```

---

```text
Choose option: 2

--- Contact List ---

1. John Doe | john@example.com | +1 555 123 4567
```

---

```text
Choose option: 5

Enter name or email to search: john

--- Search Results ---

Name: John Doe
Email: john@example.com
Phone: +1 555 123 4567
```

---

# 🛠️ Requirements

- PHP 7.4 or higher
- PHP 8+ recommended
- Command line / Terminal
- PowerShell or CMD
- No database required
- No web server required

---

# 🚀 How to Run

## ▶️ Run Simple Version

```bash
php contact_manager.php
```

## ▶️ Run Advanced OOP Version

```bash
php contact_manager/contact_manager.php
```

---

# 📚 Learning Goals

This project helps beginners practice:

- PHP syntax
- Functions & arrays
- Object-Oriented Programming
- CRUD operations
- JSON storage
- Input validation
- CLI application development
- Clean code structure

---

## 🌱 Currently Learning

- Laravel Framework
- Vue.js
- REST APIs
- MySQL & Database Design
- Clean Architecture

## 💡 Interests

- Backend Development
- CLI Applications
- Full-Stack Web Development
- Open Source Projects

---

# 🤝 Contributing

Contributions, suggestions, and improvements are welcome.

Feel free to:

- Fork the repository
- Open issues
- Submit pull requests

---

# 📄 License

This project is licensed under the MIT License.

```text
MIT License

Copyright (c) 2026 Pial Mahmud

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including, without limitation, the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES, OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT, OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
```

---

# ⭐ Support

If you found this project helpful, consider giving it a ⭐ on GitHub.

---
