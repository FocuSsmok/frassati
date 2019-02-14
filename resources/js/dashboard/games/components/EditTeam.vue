<template>
  <div class="edit-team">
    <h3 class="title is-5">Edytuj drużynę</h3>
    <div class="select">
      <select name="chosenTeam" id @change="changeTeam($event)">
        <option value>Wybierz</option>
        <option :value="team.id" :key="team.id" v-for="team in teams">{{team.name}}</option>
      </select>
    </div>
    <div class="editor" v-if="teamToEdit.name">
      <div class="control">
        <input type="text" class="input" required v-model="teamToEdit.name">
        <span @click="deleteTeam" class="delete-team" title="Usuń zespół">
          <i class="fas fa-trash-alt"></i>
        </span>
      </div>
      <button @click="editTeam" class="button is-primary">Zapisz zmiany!</button>
    </div>
  </div>
</template>

<script>
export default {
  props: ["data"],
  data() {
    return {
      chosenTeam: "",
      teamToEdit: "",
      teams: []
    };
  },
  methods: {
    changeTeam(e) {
      let id = e.target.value;
      this.teams.filter(team => {
        if (team.id == id) {
          this.teamToEdit = Object.assign({}, team);
        }
      });
    },
    editTeam() {
      if (this.teamToEdit && this.teamToEdit.name !== "") {
        let team = this.teamToEdit;
        axios
          .post(`/api/game/editTeam/${this.$route.params.team}/${team.id}`, {
            team: team.name
          })
          .then(response => {
            console.log(response.data);
            this.$parent.$parent.reGenerateTable();
            this.$parent.closeModal();
          })
          .catch(error => console.log(error));
      }
    },
    deleteTeam() {
      if (this.teamToEdit && this.teamToEdit.name !== "") {
        let team = this.teamToEdit;
        axios
          .post(`/api/game/deleteTeam/${this.$route.params.team}/${team.id}`)
          .then(response => {
            console.log(response.data);
            this.$parent.$parent.reGenerateTable();
            this.$parent.$parent.fetchTeams();
            this.$parent.closeModal();
            this.teamToEdit = "";
          })
          .catch(error => console.log(error));
      }
    }
  },
  watch: {
    data(newProps, oldProps) {
      console.log(newProps);
      this.teams = [...newProps];
    }
  },
  created() {
    this.teams = [...this.data];
  }
};
</script>

<style lang="scss" scoped>
.editor {
  margin-top: 20px;
  & .control {
    display: flex;
    flex-flow: row nowrap;
    align-items: center;
    max-width: 400px;
    & input {
      margin-right: 10px;
      width: 80%;
    }
  }
  & .delete-team {
    vertical-align: middle;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    height: 30px;
    width: 30px;
    background-color: #3d5a80;
    color: #e0fbfc;
    border-radius: 50%;
    &:hover {
      cursor: pointer;
    }
  }
  & button {
    margin-top: 20px;
  }
}
</style>
