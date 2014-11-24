<?php


/* Request Session */
function startRequestSession()
{
    $request_session_vars = array();
    $request_session_vars[] = setSessionVar('first_name');
    $request_session_vars[] = setSessionVar('last_name');
    $request_session_vars[] = setSessionVar('email');
    $request_session_vars[] = setSessionVar('message');
    $request_session_vars[] = setSessionVar('error_message1');
    $request_session_vars[] = setSessionVar('error_message2');
    $request_session_vars[] = setSessionVar('error_message3');

    return $request_session_vars;
}

function clearRequestSession()
{
    unsetSessionVar("first_name");
    unsetSessionVar("last_name");
    unsetSessionVar("email");
    unsetSessionVar("message");
    unsetSessionVar("error_message1");
    unsetSessionVar("error_message2");
    unsetSessionVar("error_message3");
}


/* Enable Session */
function startEnableSession()
{
    $request_session_vars = array();
    $request_session_vars[] = setSessionVar('error_message1');
    $request_session_vars[] = setSessionVar('error_message2');
    $request_session_vars[] = setSessionVar('error_message3');
    return $request_session_vars;
}

function clearEnableSession()
{
    unsetSessionVar("error_message1");
    unsetSessionVar("error_message2");
    unsetSessionVar("error_message3");
}


function setSessionVar($name)
{
    $var = "";
    if (isset($_SESSION[$name])) {
        $var = $_SESSION[$name];
    } else {
        $_SESSION[$name] = "";
    }
    return $var;
}

function unsetSessionVar($name)
{
    if (isset($_SESSION[$name])) {
        unset($_SESSION[$name]);
    }
}


?>