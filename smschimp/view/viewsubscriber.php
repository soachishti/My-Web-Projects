<ol class="breadcrumb">
  <li><a href="index">Home</a></li>
  <li><a href="list">List</a></li>
  <li class="active">View Subscriber</li>
</ol><hr />
<?php 
if (!isset($_GET['id']) && empty($_GET['id'])) {
    header("Location: list");
    die();
}

use PrettyDateTime\PrettyDateTime;

if (isset($_GET['remove']) && !empty($_GET['remove'])) {
    $query = sprintf("DELETE FROM `listsubscriber` WHERE ls_id='%d' AND l_id='%d'", 
        $_GET['remove'],
        $_GET['id']
    );
    
    $list_owner_sql = sprintf("SELECT COUNT(*) AS count FROM `list` WHERE l_id='%d' AND m_id='%d'", 
        $_GET['id'],
        $_SESSION['logged_user']['m_id']
    );
    
    $valid_list = $mysqli->query($list_owner_sql)->fetch_assoc()['count'];
    if ($valid_list != 0 && $result = $mysqli->query($query)) {
        success("Subscriber successfully deleted");
    }
    else {
        error("Unable to delete subscriber");
    }
}

if (isset($_GET['is_subscribe']) && !empty($_GET['is_subscribe'])) {
    $query = sprintf("UPDATE listsubscriber SET is_subscribe='%s' WHERE ls_id='%d' AND l_id='%d'", 
        $_GET['is_subscribe'],
        $_GET['subscribe'],
        $_GET['id']
    );

    if ($result = $mysqli->query($query)) {
        success("Subscriber updated");
    }
    else {
        error("Unable to update subscriber");
    }
}

$query = sprintf("SELECT COUNT(*) AS count FROM `listsubscriber` JOIN list USING (l_id) WHERE m_id='%d' AND l_id='%d'", 
        $_SESSION['logged_user']['m_id'],
        $_GET['id']
    );
        
$totalData = $mysqli->query($query)->fetch_assoc()['count'];
$dataPerPage = 7;
$totalPagesToShow = 5;
$pagi = new Pagination($totalData, $dataPerPage, 'page');
$dataLimit = $pagi->getDataLimit();

$query = sprintf("SELECT ls.*, l.m_id FROM `listsubscriber` AS `ls` JOIN list AS `l` USING (l_id) WHERE m_id='%d' AND l_id='%d' LIMIT %d, %d", 
        $_SESSION['logged_user']['m_id'],
        $_GET['id'],
        $dataLimit['start'], 
        $dataLimit['end']);
if ($result = $mysqli->query($query)) {
    if ($result->num_rows == 0):
        info("No Record to show");
    else:
?>
<table class="table table-hover">
  <thead>
    <tr>
      <th>Name</th>
      <th>Phone No</th>
      <th>Email</th>
      <th class="align_right">Subscribed</th>
      <th class="align_right">Subscribed Date</th>
      <th class="align_right">Remove</th>
    </tr>
  </thead>
  <tbody>
<?php while ($row = $result->fetch_assoc()) : ?>
    <tr>
      <td><?php echo $row['name'] ?></td>
      <td><?php echo $row['phone_no'] ?></td>
      <td><?php echo $row['email'] ?></td>
      <td class="align_right"><a href="?id=<?php echo $_GET['id'] ?>&subscribe=<?php echo $row['ls_id']; ?>&is_subscribe=<?php echo ($row['is_subscribe'] == 'No') ? 'Yes' : 'No'; ?>"><?php echo $row['is_subscribe'] ?></a></td>
      <td  class="align_right"><?php echo PrettyDateTime::parse(new DateTime($row['datetime'])) ?></td>
      <td class="align_right"><a href="?id=<?php echo $_GET['id'] ?>&remove=<?php echo $row['ls_id']; ?>"><i class="glyphicon glyphicon-remove"></i></a></td>
    </tr>
<?php endwhile; ?>
      </tbody>
</table>

<?php 
$pagi->generateNaviClassic($totalPagesToShow);
?>

<?php endif; ?>
<?php } ?>
