<?php

// Function to sanitize
function sanitizeInput($input)
{
    $input = trim($input);
    $input = htmlspecialchars($input);
    $input = stripslashes($input);

    return $input;
}
//Hämtar alla listor (per user i framtiden)
function getListAll($userID)
{
    global $conn;
    $stmt = $conn->query('SELECT listID, title, description FROM lists WHERE userID =' . $userID);
    return $stmt->fetchAll();
}
//hämtar en lista
function getListOne($listID)
{
    global $conn;
    $stmt = $conn->query('SELECT listID, title, description FROM lists WHERE listID =' . $listID);

    return $stmt->fetch();
}

//Lägg till ny lista
function addList($listData)
{
    global $conn;
    $stmt = $conn->prepare("INSERT INTO lists(title, description, userID) VALUES (:title, :description, :userID)");
    $stmt->bindParam(':title', $listData['title']);
    $stmt->bindParam(':description', $listData['description']);
    $stmt->bindParam(':userID', $listData['userID']);

    $stmt->execute();
}
// FUNKTIONER FÖR ATT LÄGGA TILL EN NY LISTA

// Hämta en lista som heter något specifik för att se om listan redan finns
function checkListTitleFromUser($userID)
{
    global $conn;
    $listTitle = "";
    switch ($_POST['new_list']) {
        case 1:
            $listTitle = "Gift List";
            break;
        case 2:
            $listTitle = "Groceries";
            break;
        case 3:
            $listTitle = "Event List";
            break;
        case 4:
            $listTitle = "Dinner List";
            break;
        case 5:
            $listTitle = "Dessert List";
            break;
        case 6:
            $listTitle = "Decorations List";
            break;
    }
    $stmt = $conn->query("SELECT listID FROM lists WHERE userID = $userID AND title = '$listTitle'");

    return $stmt->fetch();
}
// Add specific list with predefined tasks
function addPredefinedList($userID)
{
    global $conn;
    $ListTitle = "";
    $ListDescription = "";

    switch ($_POST['new_list']) {
        case 1:
            $ListTitle = "Gift List";
            $ListDescription = "Who to gift";
            break;
        case 2:
            $ListTitle = "Groceries";
            $ListDescription = "What to buy";
            break;
        case 3:
            $ListTitle = "Event List";
            $ListDescription = "Where to go";
            break;
        case 4:
            $ListTitle = "Dinner List";
            $ListDescription = "What to eat";
            break;
        case 5:
            $ListTitle = "Dessert List";
            $ListDescription = "What to bake";
            break;
        case 6:
            $ListTitle = "Decorations List";
            $ListDescription = "Where to decorate";
            break;
    }
    // var_dump($ListTitle);
    $stmt = $conn->prepare("INSERT INTO lists(title, description, userID) VALUES 
    (:title, :description, $userID)");
    $stmt->bindParam(':title', $ListTitle);
    $stmt->bindParam(':description', $ListDescription);

    $stmt->execute();

    $list = checkListTitleFromUser($userID);
    $listID = $list['listID'];
    // var_dump($listID);
    switch ($_POST['new_list']) {
        case 1:
            $stmt = $conn->exec("INSERT INTO tasks(listID, title) VALUES 
            ($listID, 'Mamma'),
            ($listID, 'Pappa'),
            ($listID, 'Mormor'),
            ($listID, 'Morfar')");
            break;
        case 2:
            $stmt = $conn->exec("INSERT INTO tasks(listID, title) VALUES 
            ($listID, 'smör'),
            ($listID, 'ägg'),
            ($listID, 'ljus sirap'),
            ($listID, 'vetemjöl')");
            break;
        case 3:
            $stmt = $conn->exec("INSERT INTO tasks(listID, title) VALUES 
            ($listID, 'Julmarknad Gamla stan'),
            ($listID, 'Nobel week lights'),
            ($listID, 'Barnen lucia på skola'),
            ($listID, 'Julbord med jobbet')");
            break;
        case 4:
            $stmt = $conn->exec("INSERT INTO tasks(listID, title) VALUES 
            ($listID, 'Janssons fretelse'),
            ($listID, 'Julskinka'),
            ($listID, 'Rödbetssallad'),
            ($listID, 'Julköttbullar')");
            break;
        case 5:
            $stmt = $conn->exec("INSERT INTO tasks(listID, title) VALUES 
            ($listID, 'Chokladkola'),
            ($listID, 'Lussebullar'),
            ($listID, 'Pepparkakor'),
            ($listID, 'Mintkyssar')");
            break;
        case 6:
            $stmt = $conn->exec("INSERT INTO tasks(listID, title) VALUES 
            ($listID, 'Pynta altan/balkongen'),
            ($listID, 'Klä julgranen'),
            ($listID, 'Ta fram adventsljustakar'),
            ($listID, 'Krans på dörren')");
            break;
    }
}
//ändra list titel och descript
function editList($listData)
{
    global $conn;
    $stmt = $conn->prepare("UPDATE lists SET title = :title, description = :description WHERE listID = :listID");
    $stmt->bindParam(':title', $listData['title']);
    $stmt->bindParam(':description', $listData['description']);
    $stmt->bindParam(':listID', $listData['listID']);

    $stmt->execute();
}
//
function deleteList($listID)
{
    global $conn;
    $stmt = $conn->exec("DELETE FROM lists WHERE listID =" . $listID);
}

//if sats för om det ska vara lägga till/ ändra eller deleta en lista
if (isset($_POST['crud']) && $_POST['crud'] == "addList") {
    $title = sanitizeInput($_POST['title']);
    $description = sanitizeInput($_POST['description']);
    addList(['title' => $title, 'description' => $description, 'userID' => $_POST['userID']]);
} elseif (isset($_POST['crud']) && $_POST['crud'] == "editList") {
    $title = sanitizeInput($_POST['title']);
    $description = sanitizeInput($_POST['description']);
    editList(['listID' => $_POST['id'],'title' => $title, 'description' => $description]);
} elseif (isset($_POST['crud']) && $_POST['crud'] == "deleteList") {
    deleteList($_POST['id']);
}
//Hämtar alla uppgifter per lista
function getTasksPerList($listID)
{
    global $conn;
    $stmt = $conn->query('SELECT taskID, title, is_completed, listID FROM tasks WHERE listID = ' . $listID);

    return $stmt->fetchAll();
}
function getTasksAndchecked($listID)
{
    global $conn;
    $stmt = $conn->query('SELECT taskID, title, listID FROM tasks WHERE is_completed = 1 AND listID =' . $listID);

    return $stmt->fetchAll();
}
function getTasksAndunchecked($listID)
{
    global $conn;
    $stmt = $conn->query('SELECT taskID, title, listID FROM tasks WHERE is_completed = 0 AND listID =' . $listID);

    return $stmt->fetchAll();
}
//hämtar en task från en lista
function getTaskOne($taskID)
{

    global $conn;
    $stmt = $conn->query('SELECT * FROM tasks WHERE taskID =' . $taskID);

    return $stmt->fetch();
}
//lägga till task
function addTask($taskData)
{
    global $conn;
    $stmt = $conn->prepare("INSERT INTO tasks(listID, title) VALUES (:listID, :title)");
    $stmt->bindParam(':listID', $taskData['listID']);
    $stmt->bindParam(':title', $taskData['title']);

    $stmt->execute();
}
//ta bort vald task
function deleteTask($taskID)
{
    global $conn;
    $stmt = $conn->exec("DELETE FROM tasks WHERE taskID =" . $taskID);
}
if (isset($_POST['crud'])) {
    if ($_POST['crud'] == "deleteTask") {
        deleteTask($_POST['id']);
    } elseif ($_POST['crud'] == "addTask") {
        $title = sanitizeInput($_POST['title']);
        addTask(['listID' => $_POST['listID'], 'title' => $title]);
    }
}
//done eller icke done task
//sätter en icke done till done
function completedTask($taskID)
{
    global $conn;
    $stmt = $conn->exec('UPDATE tasks SET is_completed = 1 WHERE taskID =' . $taskID);
}
//sätter en done till icke done
function incompletedTask($taskID)
{
    global $conn;
    $stmt = $conn->exec('UPDATE tasks SET is_completed = 0 WHERE taskID =' . $taskID);
}
if (isset($_POST['is_completed'])) {
    if ($_POST['is_completed'] == 0) {
        completedTask($_POST['id']);
    } elseif ($_POST['is_completed'] == 1) {
        incompletedTask($_POST['id']);
    }
}
//ADMIN FUNCTIONS

// Hämtar alla users order by rollen
function getAllUsers()
{
    global $conn;
    $stmt = $conn->query('SELECT username, role, userID FROM users ORDER BY role');

    return $stmt->fetchAll();
}
// Hämtar alla listor med en specifik userID
function getAllListsfromAllUsers()
{
    global $conn;
    $stmt = $conn->query('SELECT lists.title, users.username FROM lists INNER JOIN users ON lists.userID = users.userID');

    return $stmt->fetchAll();
}
// Assigna admin roll
function assignAdmin($userID)
{
    global $conn;
    $stmt = $conn->exec('UPDATE users SET role = "admin" WHERE userID =' . $userID);
}
// Ta bort admin roll
function removeAdmin($userID)
{
    global $conn;
    $stmt = $conn->exec('UPDATE users SET role = null WHERE userID =' . $userID);
}
if (isset($_POST['admin'])) {
    if ($_POST['admin'] == 'remove') {
        removeAdmin($_POST['id']);
    } elseif ($_POST['admin'] == 'assign') {
        assignAdmin($_POST['id']);
    }
}
