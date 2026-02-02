<?php
  declare(strict_types=1);

  $expenseCollection = [];
  $expense_id = 0;

  echo "Welcome to CLI Expense Tracker\n";
  $myBudget = readline("Enter you budget first in Php: ");


  while (true) {
    if (is_numeric($myBudget)) {
      $myBudget = (float) $myBudget;
      showOptions();
      $option = readline("Enter option: ");
      goToOptions($option);
    } else {
      echo "Enter valid input (Numeric).\n";
      $myBudget = readline("Enter you budget first in Php: ");
    }
  }


  function showOptions () {
    echo "EXPENSE TRACKER\n";
    echo "A.) View Expenses\n";
    echo "B.) Add Expenses\n";
    echo "C.) Edit Expense\n";
    echo "D.) Delete Expense\n";
    echo "E.) Exit\n";
  }

  function goToOptions ($option) {
    switch ($option) {
      case 'A': case 'a':
        viewExpenses();
        break;
      case 'B': case 'b':
        addExpenseRow();
        break;
      case 'C': case 'c':
        editExpenseRow();
        break;
      case 'D': case 'd':
        echo "D option";
        break;
      case 'E': case 'e':
        echo "E option";
        break;
      default:
      echo "None of the option";
    }
  }

  function viewExpenses () {
    print_r($GLOBALS["expenseCollection"]);
    showOptions();
    $option = readline("Enter options: ");
    goToOptions($option);
  }

  function addExpenseRow () {
    $date = readline("Enter date: ");
    $description = readline("Enter description: ");
    $category = readline("Enter category: ");
    $amount = readline("Enter amount: ");
    $GLOBALS["expenseCollection"][$GLOBALS["expense_id"]] = [
      "date" => $date,
      "description" => $description,
      "category" => $category,
      "amount" => $amount
    ];
    $GLOBALS["expense_id"]++;
    echo "Added successfully\n";
    print_r($GLOBALS["expenseCollection"]);
  }

  function editExpenseRow () {
    $editExpenseRow = readline("What expense row you want to change (Enter the expense_id): ");
    if (array_key_exists($editExpenseRow, $GLOBALS["expenseCollection"])) {
        $specificExpenseColumnEdit = readline("Choose the key you want to edit [date, description, category, amount]: ");

        switch ($specificExpenseColumnEdit) {
          case "date":
            echo "Change Date\n";
            break;
          case "description":
            echo "Change Description\n";
            break;
          case "category":
            echo "Change Category\n";
            break;
          case "amount":
            echo "Change Amount\n";
            break;
          default:
            echo "There is no key exist\n";
            break;
        }
        }
    }

?>
