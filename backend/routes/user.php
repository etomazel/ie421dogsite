<?php

$app->get('/api/user', function ($request, $response, $args) {  //GET example

    $pdo =$this->pdo;
    $selectStatement = $pdo->select()
                            ->from('user');
	$stmt = $selectStatement->execute();
	$contacts= $stmt->fetchAll();

	$res['success'] = true;
	$res['data'] = $contacts;
	$response->write(json_encode($res));
	$pdo = null;
	return $response;
});

$app->post('/api/user', function ($request, $response, $args) { //POST example

 	$pdo =$this->pdo;
	$params = $request->getParsedBody();
	$username = $params['username'];
	$password = $password['password'];
	$email = $params['email'];
    $first = $params['first_name'];
	$middle = $params['middle_name'];
	$last = $params['last_name'];
	$dob = $params['dob'];

    $insertStatement = $pdo->insert(array( 'username', 'password', 'email', 'first_name', 'middle_name','last_name','dob' ))
								->into('user')
								->values(array($username, $password, $email, $first, $middle, $last, $dob));
    $insert =  $insertStatement->execute();

	$res['status'] = 'success';
	$response->write(json_encode($res));
	$pdo = null;
	return $response;
});

?>
