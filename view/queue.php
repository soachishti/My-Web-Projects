<ol class="breadcrumb">
  <li><a href="index">Home</a></li>
  <li class="active">Queue</li>
</ol>
<hr />
<h1>Queue</h1>
<?php 
if (isset($_GET['remove']) && !empty($_GET['remove'])) {
    $query = sprintf("DELETE FROM `queue` WHERE q_id='%d'",
        $_GET['remove']
    );
    if ($result = $mysqli->query($query)) {
        success("Item successfully deleted");
    }
    else {
        error("Failed to delete item");
    }
}
?>


<?php

$query = sprintf("
            SELECT COUNT(*) AS count FROM queue AS q 
            JOIN message AS m USING (m_id)
            JOIN compaign AS c USING (c_id)
            WHERE c.m_id='%d'", 
        $_SESSION['logged_user']['m_id']
    );

$totalData = $mysqli->query($query)->fetch_assoc()['count'];
$dataPerPage = 7;
$totalPagesToShow = 5;
$pagi = new Pagination($totalData, $dataPerPage, 'page');
$dataLimit = $pagi->getDataLimit();

$query = sprintf("
            SELECT q.*, m.* FROM queue AS q 
            JOIN message AS m USING (m_id)
            JOIN compaign AS c USING (c_id)
            WHERE c.m_id='%d'
            LIMIT %d, %d", 
        $_SESSION['logged_user']['m_id'],
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
      <th>Queue ID</th>
      <th>Message ID</th>
      <th>Status</th>
      <th>API Server</th>
      <th>Remove</th>
    </tr>
  </thead>
  <tbody>
<?php while ($row = $result->fetch_assoc()) : ?>
    <tr>
      <td><?php echo $row['q_id'] ?></td>
      <td><?php echo $row['m_id'] ?></td>
      <td><?php echo $row['status'] ?></td>
      <td><?php echo $row['a_id'] ?></td>
      <td class="align_right"><a href="?remove=<?php echo $row['q_id']; ?>"><i class="glyphicon glyphicon-remove"></i></a></td>
    </tr>
<?php endwhile; ?>
      </tbody>
</table>

<?php 
$pagi->generateNaviClassic($totalPagesToShow);
?>

<?php endif; ?>
<?php } ?>