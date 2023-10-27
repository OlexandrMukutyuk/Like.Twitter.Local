<?php
require_once 'classes/user.php';

class PostManager {
    private $connections;

    public function __construct($db) {
        $this->connections = $db;
    }

    public function getPostsByUser($user_id) {
        $sql = "SELECT * FROM post_message WHERE user_id = :user_id ORDER BY time DESC";
        $stmt = $this->connections->prepare($sql);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();

        $posts = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $post = new Post($row['id'], $row['message']);
            $posts[] = $post;
        }

        return $posts;
    }
}

class Post {
    private $id;
    private $message;

    public function __construct($id, $message) {
        $this->id = $id;
        $this->message = $message;
    }

    public function getId() {
        return $this->id;
    }

    public function getMessage() {
        return $this->message;
    }
}

session_start();
$title = "Профіль";
if (!$_SESSION['user']) {
    header('Location: authorization.php');
}

require('templates/header_HTML.php');
require('templates/menu.php');
require_once 'includes/connect.php';

$postManager = new PostManager($connections);
$user_id = $_SESSION['user']->id;
$posts = $postManager->getPostsByUser($user_id);

foreach ($posts as $post) {
    $htmlBlock .= '<div class="result-block-user">';
    $htmlBlock .= '<p id="mess" class="message">' . htmlspecialchars($post->getMessage(), ENT_QUOTES, 'UTF-8') . '</p>';
    $htmlBlock .= '<input type="hidden" id="hidden-data" class="hidden-data" value="' . $post->getId() . '">';
    $htmlBlock .= '</div>';
}
?>

<?php echo $htmlBlock; ?>


<div class="redact-modal hidden">
    <div class="redact-content">
        <input type="hidden" id="hidden-input" value="">
        <textarea id="redact-textarea"></textarea>
        <button id="edit-button">Редагувати</button>
        <button id="delete-button">Видалити</button>
    </div>
</div>

</div>
</div>

<script src="dist/main.js"></script>
<script src="static/js/profile.js"></script>

<?php
require('templates/foter_HTML.php');
?>
