//Vue JS Files

window.onload = function () {
  var app = new Vue({
    el: "#page-background",
    data:{
      type: '',
      isLoading: false,
      color: '',
      posts: [],
      show_cat: false,
      which_type: '',
      disabled: 0,
      loadingText: 'Save',
      main_color: '#ff0000',
    },
    methods: {
      getPostType(currentUrl) {
        if (this.type == '') {
          return this.show_cat = false;
        }
        this.isLoading = true;
        this.loadingText = 'Loading...';
        axios.get(currentUrl + '/actions/action.php', {
          params: {
            action: this.type,
          }
        })
          .then(response => {
            this.show_cat = true;
            this.posts = response.data;
            this.isLoading = false;
            this.loadingText = 'Save';
            return true;
          }).catch(error => {
            alert('There was an error in loading data, please refresh your page')
            this.isLoading = false;
          });
      },

      saveData(currentUrl) {
        this.isLoading = true;
        this.loadingText = 'Loading...';
        const data = {
          which_type: this.which_type,
          type: this.type,
          main_color: this.main_color,
          action: 'save_data',
        }

        if (this.which_type == '') {
          alert('Sorry, some values are needed to be filled.')
          return;
        }
        axios.get(currentUrl + '/actions/insert.php', { params: data }).
        then(response => {
          alert(response.data.message);
          this.isLoading = false;
          this.loadingText = 'Save';
          location.reload()
        }).catch(error => {
          alert(error.response.data.message);
          this.isLoading = false;
          this.loadingText = 'Save';
        })
      },

      deleteRow(currentUrl, id, title) {
        if (!confirm('Are you sure you want to delete ' + title)) {
          return;
        }
        this.isLoading = true;
        this.loadingText = 'Loading...';
        const data = {
          id: id,
          action: 'edit_data',
        }
        axios.get(currentUrl +'/actions/insert.php', { params: data }).
        then(response => {
          console.log(response);
          alert('This data was successfully deleted');
          this.isLoading = false;
          this.loadingText = 'Save';
          location.reload();
        }).catch(error => {
          alert('There was an error deleting this data');
          this.isLoading = false;
          this.loadingText = 'Save';
        });
      },

      editRow(currentUrl, id, type, color) {
        this.type = type;
        this.isLoading = true;
        this.loadingText = 'Loading...';
        axios.get(currentUrl + '/actions/action.php', {
          params: {
            action: this.type,
          }
        })
          .then(response => {
            this.show_cat = true;
            this.posts = response.data;
            this.isLoading = false;
            this.loadingText = 'Update';
            this.which_type = id;
            this.main_color = color;
            this.disabled = 1;
          }).catch(error => {
            alert('There was an error in loading data, please refresh your page')
            this.isLoading = false;
          });
      }
    },
  });

  jQuery('.color-picker').spectrum({
    type: "text",
    showInput: true,
    color: '#000000',
  });

  jQuery('#color-picker2').on('change', function () {
    jQuery('#hover_color').text(this.value);
  });

  //datatables
  jQuery(document).ready(function () {
    jQuery('#results-table').DataTable();
  })

  //fix the menu drop down item
}