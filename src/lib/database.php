<?php

function db_connect()
{
    try {
        global $config;
        global $database_connection;
        $database_connection = new PDO($config['db_dsn'], $config['db_user'], $config['db_pass']);
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
}

function db_query($sql,$params = array()){
    global $database_connection;
    if (!is_object($database_connection)) {
        db_connect();
    }

    $query = $database_connection->prepare($sql);
    try
    {
        $database_connection->beginTransaction();

        if (count($params) > 0)
        {
            $result = $query->execute($params);
        }
        else {
            $result = $query->execute();

        }
        if (!$result)
        {
            echo '<pre>';
            $err = $query->errorInfo();
            print_r($err);
            echo '</pre>';
        }


        $_SESSION['db_last_insert_id'] = $database_connection->lastInsertId();
        $database_connection->commit();
    }
    catch(PDOExecption $e)
    {
        $database_connection->rollback();
        print "Error!: " . $e->getMessage() . "</br>";
    }

    return $query->fetchAll(PDO::FETCH_ASSOC);
}
