<?php

// Set the response header to JSON
header('Content-Type: application/json');

// Check the request method
$method = $_SERVER['REQUEST_METHOD'];
if ($method === 'POST') {

  // Retrieve the JSON data from the request body
  $json_data = file_get_contents('php://input');

  // Decode the JSON data into an associative array
  $data = json_decode($json_data, true);

  // Validate the data
  if (empty($data['name']) || empty($data['email']) || empty($data['passe'])  || empty($data['dplace']) || empty($data['budget'])) {
    $response = array('success' => false, 'message' => 'All fields are required');
    echo json_encode($response);
    exit();
  }

  // Connect to the database
  $servername = 'localhost';
  $username = 'root';
  $password = '';
  $dbname = 'travellers_detail';
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check for connection errors
  if ($conn->connect_error) {
    $response = array('success' => false, 'message' => 'Database connection error: ' . $conn->connect_error);
    echo json_encode($response);
    exit();
  }

  
  $valueName= $data['name'];
  $valueEmail =  $data['email'];
  $valueDplace = $data['dplace'];
  $valuePasse= $data['passe'];
  $valueBudget = $data['budget'];
  

  $stmt = $conn->prepare('INSERT INTO travellers (passe, name, dplace, budget, email) VALUES (?, ?, ?, ?, ?)');

  $stmt->bind_param
  ('issis', $valuePasse, $valueName, $valueDplace, $valueBudget, $valueEmail);


  // Execute the SQL statement
  if ($stmt->execute() === TRUE) {

    $response = array('success' => true, 'message' => 'Data saved successfully' , 'data' => array(
      'name' => $data['name'],
      'email' => $data['email'],
      'dplace' => $data['dplace'],
      'passe' => $data['passe'],
      'budget' => "$".$data['budget'],
      'amount_to_pay'=>"$".($data['passe'] * 1000)
    ));
    echo json_encode($response);
  } else {
    $response = array('success' => false, 'message' => 'Unable to save data: ' . $conn->error);
    echo json_encode($response);
  }

  // Close the database connection
  $stmt->close();
  $conn->close();

} else if ($method === 'GET') {

  // Connect to the database
  $servername = 'localhost';
  $username = 'root';
  $password = '';
  $dbname = 'travellers_detail';
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check for connection errors
  if ($conn->connect_error) {
    $response = array('success' => false, 'message' => 'Database connection error: ' . $conn->connect_error);
    echo json_encode($response);
    exit();
  }

  // Prepare the SQL statement to retrieve the data from the database
  $stmt = $conn->prepare('SELECT * FROM travellers');

// Execute the SQL statement
if ($stmt->execute() === TRUE) {


// Retrieve the data from the database
$result = $stmt->get_result();

// Create an array to store the data
$data = array();

// Loop through the data and add it to the array
while ($row = $result->fetch_assoc()) {
  $data[] = $row;
}

// Return the data as JSON
echo json_encode($data);
} else {
$response = array('success' => false, 'message' => 'Unable to retrieve data: '
. $conn->error); echo json_encode($response); }

// Close the database connection $stmt->close(); $conn->close();

} else {

// Invalid request method 
  $response = array('success' => false, 'message' => 'Invalid request method');
   echo json_encode($response);

}
