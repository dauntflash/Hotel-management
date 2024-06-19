<?php
$con=mysqli_connect("localhost", "root", "loan") or die(mysqli_error());
?>


<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "loan";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the form data
echo "PERSONAL DETAILS";


if(isset($_POST['application_date'])){
    $application_date = $_POST['application_date'];
    }

if(isset($_POST['membership_no'])){
    $membership_no = $_POST['membership_no'];
    }

if(isset($_POST['name'])){
    $name = $_POST['name'];
    }

if(isset($_POST['id'])){
    $id = $_POST['id'];
    }
if(isset($_POST['nationality'])){
    $nationality = $_POST['nationality'];
    }

if(isset($_POST['address'])){
    $address = $_POST['address'];
    }
if(isset($_POST['box'])){
$box = $_POST['box'];
}


if(isset($_POST['postal_code'])){
    $postal_code = $_POST['postal_code'];
    }

if(isset($_POST['residence_town'])){
    $residence_town = $_POST['residence_town'];
    }

if(isset($_POST['email'])){
    $email = $_POST['email'];
    }

if(isset($_POST['phone'])){
    $phone = $_POST['phone'];
    }

echo "EMPLOYMENT/OCCUPATION DETAILS";
if(isset($_POST['terms'])){
    $employment_terms = $_POST['terms'];

}

if(isset($_POST['expiry_date'])){
    $expiry_date = $_POST['expiry_date'];

}


if(isset($_POST['employer'])){
    $employer = $_POST['employer'];
    }

if(isset($_POST['position'])){
    $position= $_POST['position'];
    }

if(isset($_POST['business_name'])){
    $business_name = $_POST['business_name'];
    }

if(isset($_POST['country'])){
    $country = $_POST['country'];
    }

if(isset($_POST['physical_address'])){
    $physical_address= $_POST['physical_address'];
    }

if(isset($_POST['business_address'])){
    $business_address = $_POST['business_address'];
}

if(isset($_POST['post_code'])){
    $postalcode = $_POST['post_code'];
}

if(isset($_POST['town'])){
    $town = $_POST['town'];
}
echo "LOAN DETAILS";

if(isset($_POST['loantype'])){
    $loantype = $_POST['loantype'];
}

if(isset($_POST['loan_amount'])){
    $loan_amount = $_POST['loan_amount'];
}

if(isset($_POST['in_words'])){
    $in_words = $_POST['in_words'];
}

if(isset($_POST['payment_period'])){
    $payment_period = $_POST['payment_period'];
}

if(isset($_POST['payment_words'])){
    $payment_words = $_POST['payment_words'];
}

echo "MODE OF LOAN DISBURSEMENT";

if(isset($_POST['cheque_name'])){
    $cheque_name = $_POST['cheque_name'];
}

if(isset($_POST['bank_name'])){
    $bank_name = $_POST['bank_name'];
}

if(isset($_POST['branch'])){
    $branch = $_POST['branch'];
}

if(isset($_POST['account_no'])){
    $account_no = $_POST['account_no'];
}

if(isset($_POST['account_name'])){
    $account_name = $_POST['account_name'];
}

if(isset($_POST['mpesa_no'])){
    $mpesa_no = $_POST['mpesa_no'];
}

if(isset($_POST['mpesa_name'])){
    $mpesa_name = $_POST['mpesa_name'];
}

 echo "DECLARATION";


if(isset($_POST['declaration_check'])){
    $declaration_check = $_POST['declaration_check'];
}

if(isset($_POST['full_name'])){
    $full_name = $_POST['full_name'];
}

if(isset($_POST['submission_date'])){
    $submission_date = $_POST['submission_date'];
}



// Insert the form data into the database
$sql = "INSERT INTO form (application_date, membership_no, name, id, nationality, address, box, postal_code, 
residence_town, email, phone, terms, expiry_date, employer, position, business_name, country, physical_address, 
business_address, post_code, town, loantype, loan_amount, in_words, payment_period, payment_words, cheque_name,
 bank_name, branch, account_no, account_name, 
mpesa_no, mpesa_name, declaration_check, full_name, submission_date) VALUES ('$application_date', 
'$membership_no', '$name', '$id', '$nationality',
 '$address', '$box', '$postal_code', '$residence_town', '$email', '$phone',
 '$terms', '$expiry_date', '$employer', '$position', '$business_name', '$country', '$physical_address',
  '$business_address', '$post_code', '$town', '$loantype', '$loan_amount', '$in_words', '$payment_period', 
  '$payment_words', '$cheque_name', '$bank_name', '$branch', '$account_no', '$account_name',
   '$mpesa_no', '$mpesa_name', '$declaration_check', '$full_name', '$submission_date')";

  if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>