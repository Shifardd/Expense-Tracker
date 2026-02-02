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
    $editExpense = readline("What expense row you want to change (Enter the expense_id): ");
    if (array_key_exists($editExpense, $GLOBALS["expenseCollection"])) {
      getSpecificExpenseColumn($editExpense);
    } else {
      echo "The expense_id you gave does not exist\n";
      editExpenseRow ();
    }
  }

    function getSpecificExpenseColumn ($editExpense) {
      $specificExpenseColumnEdit = readline("Choose the key you want to edit [date, description, category, amount]: ");
      switch ($specificExpenseColumnEdit) {
          case "date":
            $GLOBALS["expenseCollection"][$editExpense][$specificExpenseColumnEdit] = readline("Enter updated date: ");
            echo "Successfully Change Date\n";
            print_r($GLOBALS["expenseCollection"]);
            break;
          case "description":
            $GLOBALS["expenseCollection"][$editExpense][$specificExpenseColumnEdit] = readline("Enter updated description: ");
            echo "Successfully Change Description\n";
            print_r($GLOBALS["expenseCollection"]);
            break;
          case "category":
            $GLOBALS["expenseCollection"][$editExpense][$specificExpenseColumnEdit] = readline("Enter updated category: ");
            echo "Successfully Change Category\n";
            print_r($GLOBALS["expenseCollection"]);
            break;
          case "amount":
            $GLOBALS["expenseCollection"][$editExpense][$specificExpenseColumnEdit] = readline("Enter updated amount: ");
            echo "Successfully Change Date\n";
            print_r($GLOBALS["expenseCollection"]);
            break;
          default:
            echo "There is no key exist\n";
            break;
    }
    }

?>
