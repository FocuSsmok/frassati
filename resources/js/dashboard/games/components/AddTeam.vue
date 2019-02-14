<template>
  <div class="form">
    <form-field type="text" name="team" label="Nazwa Drużyny" :value="team" @input="team = $event"/>
    <button class="button is-primary" @click.prevent="addTeam">Dodaj</button>
  </div>
</template>

<script>
import FormField from "./FormField";
export default {
  name: "add-team",
  data() {
    return { team: "" };
  },
  components: { FormField },
  methods: {
    addTeam() {
      if (this.team !== "") {
        axios
          .post(`/api/game/addTeam/${this.$route.params.team}`, {
            team: this.team
          })
          .then(response => {
            console.log(response.data);
            this.team = "";
          })
          .catch(error => console.log(error));
      }
    }
  }
};
</script>
