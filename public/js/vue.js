//var urlUser='https://randomuser.me/api/?results=10';
var urlUser='vue/users';
new Vue({
  el:'#main',
  created: function(){
    this.getUsers();
  },
  data:{
    people:['Lynda', 'Isabella', 'Diana', 'Luisa'],
    name:'',
    info:'',
    lists:[],
  },
  methods:{
    addName: function(){
      this.people.push(this.name);
      this.name='';
    },
    getUsers: function(){
      /*  VUE RESOURCE
        this.$http.get(urlUser).then(function (response) {
        this.lists=response.data;
      });*/
      axios.get(urlUser).then(response => {
        this.lists = response.data;
      });
    },
  }
});
