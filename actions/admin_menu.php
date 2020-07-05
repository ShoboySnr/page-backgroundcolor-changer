<?php 

add_action('admin_menu', 'page_backgroundcolor_changer_admin_action');
function page_backgroundcolor_changer_admin_action() {
  add_options_page('Page BackgroundColor Changer', 'Page BackgroundColor Changer', 'manage_options', __FILE__, 'page_backgroundcolor_admin');
}

function page_backgroundcolor_admin() {

  ?>
    <div id="page-background" class="wrap" v-cloak>
      <h1>Page Background Color Changer</h1>
      <div id="add-content">
        <h2>Configuration</h2>
  
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-5">
            <form class="form" id="addNewColor">
              <div class="form-group">
                <label for="type">Type</label>
                <select name="type" v-model="type" :value="type" id="type" class="form-control form-control-lg" @change="getPostType('<?php echo PBC_PLUGIN_URL ?>')"  :disabled="disabled == 1">
                  <option value="">Select Option</option>  
                  <option value="post">Post</option>
                  <option value="page">Page</option>
                  <option value="category">Category</option>
                </select>
              </div>
              <div v-show="show_cat" style="display: none">
                <div class="form-group show_cat">
                  <label for="which_type">Choose {{ type || 'Post' }}</label>
                  <select name="which_type" v-model="which_type" id="which_type" class="form-control form-control-lg" :disabled="disabled == 1">
                  <option value="" :selected="which_type == '' ? 'selected' : ''">Select {{ type || 'Post' }}</option> 
                    <option v-for="(post, index) in posts" :key="index" :value="post.id" :selected="which_type === post.id ? 'selected' : ''">{{ post.title }}</option>
                  </select>
                </div>
  
                <div class="form-group show_cat">
                  <label for="color">Choose Background Main Color</label>
                  <input type="color" id="color" v-model="main_color" name="main_color" class="form-control">
                </div>
              </div>
  
              <div class="submit-button">
                <button type="button" id="submit-button" class="btn btn-outline-primary btn-lg" :disabled="isLoading" @click="saveData('<?php echo PBC_PLUGIN_URL ?>')" v-cloak>{{ loadingText }}</button>
              </div>
          
            </form>
            </div>
            <div class="col-md-6">
            <table class="widefat table table-striped" id="results-table">
              <thead class="thead-dark">
                <tr>
                  <th>
                    No
                  </th>
                  <th>
                    Post Type
                  </th>
                  <th>
                    Title
                  </th>
                  <th>
                   Background Main Color
                  </th>
                  <th>
                    Action
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php 

                $count = 0;
                $getData = getData();
                foreach($getData as $data) {
                    $id = $data->id;
                    if ($data->type_value == 'category') 
                    {
                      $title = get_term( $data->which_type )->name;
                    } else $title = getPostTitle($data->which_type);
                  ?>
                  <tr>
                    <td><?= ++$count ?></td>
                    <td class="text-capitalize"><?= $data->type_value ?></td>
                    <td><?php if ($data->type_value == 'category') echo substr($title, 0, 80); else echo substr($title->post_title, 0, 80) ?></td>
                    <td><?= $data->main_color; ?></td>
                    <td class="action-button">
                      <button class="btn btn-outline-success btn-sm inline-block" type="button" @click="editRow('<?= PBC_PLUGIN_URL ?>', '<?= $data->which_type ?>', '<?= $data->type_value ?>', '<?= $data->main_color; ?>' )"> Edit </button>
                      <button class="btn btn-outline-danger btn-sm inline-block" type="button" @click="deleteRow('<?= PBC_PLUGIN_URL ?>', '<?= $id ?>', '<?= addslashes($title->post_title) ?>' )"> Remove </button>
                    </td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
              <tfoot class="thead-dark">
                <tr>
                  <th>
                    No
                  </th>
                  <th>
                    Page/Post/Category
                  </th>
                  <th>
                    Title
                  </th>
                  <th>
                   Background Main Color
                  </th>
                  <th>
                    Action
                  </th>
                </tr>
              </tfoot>
            </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  
  <?php
  }
  
  ?>