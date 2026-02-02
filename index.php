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


  echo "Your budget is $myBudget\n";


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
        echo "C option";
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
    print_r($GLOBALS["expenseCollection"]);
  }

?>
