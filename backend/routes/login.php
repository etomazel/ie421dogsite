<?php
$app->post('/api/login', function ($request, $response, $args) { //POST example
    $pdo =$this->pdo;
    $params = $request->getParsedBody();
	$username = $params['username'];
    $password = $params['password'];

    $selectStatement = $pdo->select()
                            ->from('user')
                            ->where('username', '=', $username)
                            ->where('password', '=', $password);

	$stmt = $selectStatement->execute();
    
    if ($stmt->rowCount() >0)
        $res['status'] = true;
    else
        $res['status'] = false;

	// $res['data'] = $stmt->fetchAll();
    $response->write(json_encode($res));
    
	$pdo = null;
	return $response;
});

//
// demo of update
$app->post('/api/chgpwd', function ($request, $response, $args) { //POST example
    $pdo =$this->pdo;
    $params = $request->getParsedBody();
	$email = $params['email'];
    $dob = $params['dob'];
    $new_password = $params['new_password'];

    $updateStatement = $pdo->update(array('password' => $new_password))
                            ->table('user')
                            ->where('email', '=', $email)
                            ->where('dob', '=', $dob);

	$stmt = $updateStatement->execute();
    

    if ($stmt > 0) // 1 row affected, success
        $res['status'] = true;
    else
        $res['status'] = false;

    $response->write(json_encode($res));
    
	$pdo = null;
	return $response;
});

?>
