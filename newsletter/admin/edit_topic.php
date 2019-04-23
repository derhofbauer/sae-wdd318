<?php
require_once '../dbconnect.php';
require_once 'check_admin.php';

$topic_id = $_GET['topic_id'];

// wenn topic-formular abgeschickt --> speichern & redirect in Topic-Übersicht /admin/index.php
if (isset($_POST['topic'])) {
    $topic = trim($_POST['topic']);
    if (strlen($topic) >= 1) {
        $stmt = mysqli_stmt_init($link);
        $sql = "UPDATE topics SET name = ? WHERE id = ?";
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "si", $topic, $topic_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header('Location: index.php');
    }
}


// sonst: formular anzeigen


// Topic Namen abfragen
$stmt = mysqli_stmt_init($link);
$sql = "SELECT * FROM topics WHERE id = ?";
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "i", $topic_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
mysqli_stmt_close($stmt);
$topic = mysqli_fetch_all($result, MYSQLI_ASSOC)[0];
?>

<h1>Edit Topic</h1>

<form action="edit_topic.php?topic_id=<?php echo $topic['id'];?>" method="post">
    <label for="topic">Topic Name</label>
    <input type="text" name="topic" id="topic" placeholder="Topic Name" value="<?php echo $topic['name']; ?>" required>

    <br>

    <input type="submit">
</form>

<?php
require_once '../dbclose.php';
?>
