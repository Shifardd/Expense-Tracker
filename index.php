<?php
  declare(strict_types=1);

  $expenseCollection = [];
  $expense_id = 0;
  $status = true;

  echo "Welcome to CLI Expense Tracker\n";
  $myBudget = readline("Enter your budget first in Php: ");
  $remainingMoney = $myBudget;
  $totalExpenses = 0;

  $expenseCollection = [
    "budget" => $myBudget,
    "Remaining Money" => $remainingMoney,
    "Total Expenses" => $totalExpenses
  ];

  saveDataInJSON();


  while ($status) {
    if (is_numeric($myBudget)) {
      $myBudget = (float) $myBudget;
      showOptions();
      $option = readline("Enter option: ");
      $validOptions = ['a', 'b', 'c', 'd', 'quit'];
      if (in_array(strtolower($option), $validOptions)) {
        goToOptions($option);
      } else {
        echo "Invalid option\n";
      }
    } else {
      echo "Enter valid input (Numeric).\n";
      $myBudget = readline("Enter you budget first in Php: ");
    }
  }


  function showOptions () {
    echo "\n\nEXPENSE TRACKER\n";
    echo "A.) View Expenses\n";
    echo "B.) Add Expenses\n";
    echo "C.) Edit Expense\n";
    echo "D.) Delete Expense\n";
    echo "Type `quit` to exit\n";
  }

  function goToOptions ($option) {
    switch (strtolower($option)) {
      case 'a':
        viewExpenses();
        break;
      case 'b':
        addExpenseRow();
        break;
      case 'c':
        editExpenseRow();
        break;
      case 'd':
        deleteExpenseRow();
        break;
      case 'quit':
        goToExit();
        break;
      default:
        echo "None of the option";
    }
  }

  function saveDataInJSON () {
    $jsonData = json_encode($GLOBALS["expenseCollection"], JSON_PRETTY_PRINT);
    echo $jsonData;
    $file_path = 'expenses.json';
    file_put_contents($file_path, $jsonData);
  }

  function viewExpenses () {
    saveDataInJSON();
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
    getTotalExpenses();
    saveDataInJSON();
  }

  function editExpenseRow () {
    print_r($GLOBALS["expenseCollection"]);
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
          getTotalExpenses();
          saveDataInJSON();
          break;
        case "description":
          $GLOBALS["expenseCollection"][$editExpense][$specificExpenseColumnEdit] = readline("Enter updated description: ");
          echo "Successfully Change Description\n";
          getTotalExpenses();
          saveDataInJSON();
          break;
        case "category":
          $GLOBALS["expenseCollection"][$editExpense][$specificExpenseColumnEdit] = readline("Enter updated category: ");
          echo "Successfully Change Category\n";
          getTotalExpenses();
          saveDataInJSON();
          break;
        case "amount":
          $GLOBALS["expenseCollection"][$editExpense][$specificExpenseColumnEdit] = readline("Enter updated amount: ");
          echo "Successfully Change Date\n";
          getTotalExpenses();
          saveDataInJSON();
          break;
        default:
          echo "There is no key exist\n";
          getSpecificExpenseColumn($editExpense);
          break;
    }
  }

    function deleteExpenseRow () {
      print_r($GLOBALS["expenseCollection"]);
      $deleteExpense = readline("Enter expense_id you want to delete: ");
      if (array_key_exists($deleteExpense, $GLOBALS["expenseCollection"])) {
        unset($GLOBALS["expenseCollection"][$deleteExpense]);
        saveDataInJSON();
      } else {
        echo "The expense_id you gave does not exist\n";
        deleteExpenseRow();
      }
    }

    function goToExit () {
      $confirmationToExit = readline("Do you want to exit (y for yes): ");
      if ($confirmationToExit == 'y' || $confirmationToExit ==  'Y') {
        $GLOBALS["status"] = false;
      } 
    }

    function getTotalExpenses () {
      $GLOBALS["totalExpenses"] = 0;
      foreach ($GLOBALS["expenseCollection"] as $expenses) {
        foreach($expenses as $key => $value) {
          if ($key == "amount") {
            $GLOBALS["totalExpenses"] += $value;
          }
        }
      }
      $GLOBALS["expenseCollection"] ["Remaining Money"] = $GLOBALS["myBudget"] - $GLOBALS["totalExpenses"];

      $GLOBALS["expenseCollection"] ["Total Expenses"] = $GLOBALS["totalExpenses"];

      if ($GLOBALS["totalExpenses"] > $GLOBALS["myBudget"]) {
        echo "\nYour total expenses is higher than your budget\n";
        echo "Budget: " . $GLOBALS["myBudget"] . "\n";
        echo "Your total expenses " . $GLOBALS["totalExpenses"] . "\n";
      }
    }
?>
