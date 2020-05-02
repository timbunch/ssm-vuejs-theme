<template>
    <v-form v-model="valid" @submit="submit" class="contact-form">
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
        <v-fade-transition>
            <div v-if="response" class="contact-response">
                <v-btn icon absolute top right @click="response = null"><v-icon>close</v-icon></v-btn>
                <div v-html="response"></div>
            </div>
        </v-fade-transition>
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
        response: null,
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
        };
        this.$store.dispatch('SUBMIT_CONTACT', payload).then(message => {
          this.response = message;
          this.message = '';
          this.valid = false;
        });
      }
    }
  }
</script>
<style lang="scss" scoped>
    .contact-form {
        position: relative;
    }
    .contact-response {
        background-color: #fff;
        display: flex;
        justify-content: center;
        text-align: center;
        align-items: center;
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
    }
</style>
