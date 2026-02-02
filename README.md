# CLI Expense Tracker

A simple command-line expense tracking application built with pure PHP to help me as a student to manage and monitor my daily expenses effectively.

---

## Inspiration

Managing personal finances is an essential skill, especially for students like me. This project was inspired by the need to track expenses and understand where money goes on.

---

## What It Does

The CLI Expense Tracker allows users to:
- Record expenses
- View all recorded expenses
- Edit or delete specific expenses
- Monitor remaining budget after expenses

---

## Challenges Faced

Some of the key challenges during development included:
1. Designing a way to store expenses efficiently
2. Choosing and using a primary key (`expense_id`)
3. Targeting specific key–value pairs inside nested associative arrays

---

## Accomplishments

- Built the entire project from scratch using PHP
- Implemented CRUD-like functionality without relying on AI-generated code
- Strengthened problem-solving and logical thinking skills

---

## What I Learned

- Reinforced understanding of loops and control flow
- Gained deeper experience with associative arrays and array manipulation
- Learned the importance of primary keys for efficient edit and delete operations
- Improved confidence in building projects independently

---

## Built With

- **Pure PHP** (CLI-based)

---

## How I Built It

### Code Implementation (Step-by-Step)

1. Initialized an empty array and created a JSON file to store expenses.
2. Prompted the user to enter a budget, then displayed the main menu options:
   - View Expenses  
   - Add Expenses  
   - Edit Expense  
   - Delete Expense  
   - Exit
3. When adding an expense:
   - Collected date, description, category, and amount
   - Validated input types
   - Stored data in a nested associative array structure
4. When editing an expense:
- Selected an expense using `expense_id`
- Displayed its details
5. When deleting an expense:
- Removed the selected expense using its `expense_id`
6. Exited the program by breaking the main loop

---

## User Perspective

1. The user is presented with the main menu:
- View Expenses  
- Add Expenses  
- Edit Expense  
- Delete Expense  
- Exit
2. **View Expenses**  
- Displays a json containing: expense ID, date, description, category, and amount
3. **Add Expenses**  
- Prompts for expense details
- Displays the updated expense json
4. **Edit Expense**  
- Displays the expense json
- Asks for the `expense_id` to edit
- Displays the updated expense json
5. **Delete Expense**  
- Displays the expense json
- Asks for confirmation before deletion
- Returns to the menu if deletion is canceled


