<template>
    <v-form v-model="valid" @submit="submit">
        <h2>Contact Us</h2>
        <v-text-field
                filled
                type="text"
                name="name"
                label="Name"
                v-model="name"
                :rules="nameRules"
                required
        />
        <v-text-field
                filled
                type="email"
                name="email"
                label="Email"
                v-model="email"
                :rules="emailRules"
                required
        />
        <v-textarea
                v-model="message"
                name="message"
                label="Message"
                filled
        />
        <v-btn color="primary" :disabled="!valid" @click="submit">Submit</v-btn>
    </v-form>
</template>
<script>
  export default {
    name: 'contact-form',
    data() {
      return {
        name: null,
        email: null,
        message: null,
        valid: false,
        nameRules: [
          v => !!v || 'Name is required'
        ],
        emailRules: [
          v => !!v || 'E-mail is required',
          v => /.+@.+/.test(v) || 'E-mail must be valid',
        ],
      }
    },
    methods: {
      submit() {
        if (!this.valid) {
          return false;
        }
        const payload = {
          security: window.ssmSettings.security,
          name: this.name,
          email: this.email,
          message: this.message,
          subject: 'RCC Website Contact Form'
        }
        this.$store.dispatch('SUBMIT_CONTACT', payload);
      }
    }
  }
</script>
