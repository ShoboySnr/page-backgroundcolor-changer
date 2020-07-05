<?php

header('Content-type: text/css');

include('style-data.php');  

foreach ($getData as $data) {
  var_dump($data);
?>

.postid-<?= $data->which_type ?> .wrap {
  background-color: <?= $data->main_color ?> !important;
}

.postid-<?= $data->which_type ?> .header-wrap,
.page-id-<?= $data->which_type ?> .header-wrap,
.category-<?= $data->which_type ?> .header-wrap
 {
  background-color: <?= $data->main_color ?> !important;
}

.postid-<?= $data->which_type ?> .single-page {
  background-color: <?= $data->main_color ?> !important;
  margin-bottom: -45px;
  padding-bottom: 45px;
}

.page-id-<?= $data->which_type ?> #body-wrapper {
  background-color: <?= $data->main_color ?> !important;
}

.category-<?= $data->which_type ?> #body-wrapper {
  background-color: <?= $data->main_color ?> !important;
}

.category-<?= $data->which_type ?> .wp-page,
.page-id-<?= $data->which_type ?> .wp-page
{
  background-color: <?= $data->main_color ?> !important;
  margin-top: 0 !important;
  padding-top: 40px !important;
}
<?php

}

?>

#page-background {
  background: <?php echo $my_background_variable; ?>;
  padding: 30px;
}

#add-content {
  margin-top: 20px;

}

#addNewColor {
  margin: 20px 0;
}

#page-background .form-group label {
  text-transform: capitalize;
}

#page-background .form-group select {
  text-transform: uppercase;
  max-width: 100%;
}

.sp-replacer {
  width: 100% !important;
}