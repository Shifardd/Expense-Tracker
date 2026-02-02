# CLI Expense Tracker

- To add description
Inspiration (To manage my money)
What it does (I am able to put my expenses in this project and able to track it)
Challenges I ran into (1. Picking primary key)
Accomplishments that I am proud of
What I learned
Built With (Pure PHP)
How I built it (Flowchart)
[ ] Add/edit/delete expenses via command line
[ ] Store data in JSON file
[ ] Generate summary reports
[ ] Pure PHP implementation (no frameworks)
[ ] Strict types enabled

Code Implementation (Step by Step)
1. Have empty array first and create json file that store the expenses.
2. Get input for budget and show options (Options in Expense Tracker
a. View Expenses
b. Add Expenses
c. Edit Expense
d. Delete Expense
e. Exit)
3. When user add new expenses. Store it in associative array. Make sure the input is in correct type and make user enter input again if he/she gives invalid input.
sample array:
arrayName = [
  "expense_id" => [
    "date" => "date-value",
    "description" => "description-value",
    "category" => "category-value",
    "amount" => "amount-value"
  ], 
  (other expense row ...)
]
4. When user want to edit. Use arrayName[expense_id]. Then it will show date, description, category, amount. Use arrayName[expense_id][the_selected]. Then we can edit the now. Make sure the input is in correct type and make user enter input again if he/she gives invalid input.
5. When user want to delete. Use unset(arrayName[expense_id]).
6. When user want to exit. Just stop the loop by making the condition false.


User Perspective
1. Options in Expense Tracker
a. View Expenses
b. Add Expenses
c. Edit Expense
d. Delete Expense
e. Exit
2. When user type a option, It will show the table showing all expenses (expense_Id, date, description, category, amount, totalOfAll Expenses).
3. When user type b option, It will ask user to type date, description, category, amount of that expense. Show the expense table.
4. When user type c option, It will show the table of expenses and ask what expense_id the user want to edit. After typing the expense_id, it will ask what value of key you want to change. It will loop asking to edit until user type the word `quit`. Show the expense table.
5. When user type d option, It will show the table of expenses and ask what expense_id the user want to delete. After typing the expense_id, it will ask if you are sure to delete that expense_id, if you type y it will delete that row, if you type n it will not delete that row and will go back to showing options. Show the expense table.
6. When user type e option, It will close the expense tracker.