<template>
    <div id="card-element" :class="{ 'has-errors': cardErrors }">
        <form action="POST" @submit="handleSubmit(event)">
            <div class="form-group">
        <label for="card-number">Card number</label>
        <div id="card-number" class="form-control"></div>
      </div>
      <div class="form-group">
        <label for="card-expiry">Expiration date</label>
        <div id="card-expiry" class="form-control"></div>
      </div>
      <div class="form-group">
        <label for="card-cvc">CVC</label>
        <div id="card-cvc" class="form-control"></div>
      </div>
      <div class="form-group">
        <label for="card-postal-code">Postal code</label>
        <div id="card-postal-code" class="form-control"></div>
      </div>
      <div class="form-group">
        <span class="card-errors" v-if="cardErrors">{{ cardErrors }}</span>
      </div>
      <button type="submit" class="btn btn-primary">Paga ora</button>
      <span v-if="processing" class="loading-spinner"></span>
        </form>
    </div>
</template>

  <script>
  import { mapGetters } from 'vuex';
  export default {
    computed: {
    ...mapGetters(['cartTotal']),
  },
    data() {
      return {
        stripe: null,
        card: null,
        cardErrors: null,
        loading: false,
        paymentSucceeded: false,
        paymentError: null,
        processing: false,
      };
    },
    mounted() {
      this.stripe = window.Stripe('pk_test_51MgU1OI0cwEBFrNvakyDBs96H0O0GHuzQOmRKNHWVQNP3GmqUtqvqMNiny7qG0kvxTSI3Iwyee3gMX0XKXsEm1go00CoGXINkY', {
          locale: 'auto'
      });
      this.card = this.stripe.elements().create('card', {
        style: {
          base: {
            color: '#32325d',
            fontFamily: 'Arial, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
              color: '#aab7c4'
            }
          },
          invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
          }
        },
        classes: {
          focus: 'focused',
          empty: 'empty',
          invalid: 'invalid'
        }
      });
      this.card.mount('#card-element');

      this.card.addEventListener('change', (event) => {
        this.cardErrors = event.error ? event.error.message : null;
      });
    },
    methods: {
    async handleSubmit(event) {
      event.preventDefault();
      this.processing = true;

      const { token, error } = await this.$stripe.createToken('card');

      if (error) {
        console.log(error)
        this.paymentError = error.message;
        this.processing = false;
        return;
      }

      const response = await axios.post('/api/payment', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({
          amount: this.$store.getters.cartTotal/100,
          token: token.id,
        }),
      });

      const responseData = await response.json();

      if (response.ok) {
        this.paymentSucceeded = true;
        console.log('ce l\'hai fatta!!');
        this.$store.dispatch('clearCart');
        this.processing = false;
      } else {
        console.log('niente bro!');
        this.paymentError = responseData.message;
        this.processing = false;
      }
    },
  },
  }
  </script>

<style lang="scss" scoped>
#card-element {
  height: 40px;
  padding: 10px 12px;
  border-radius: 4px;
  border: 1px solid #ccc;
  background-color: #fff;
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  margin-bottom: 15px;
}

#card-element--invalid {
  border-color: #fa755a;
}

.card-errors {
  color: #fa755a;
  font-size: 14px;
  font-weight: 500;
  margin-top: 5px;
}

.loading-spinner {
  border: 4px solid rgba(0, 0, 0, 0.1);
  border-left-color: #777;
  border-radius: 50%;
  width: 1.5rem;
  height: 1.5rem;
  animation: spin 1s linear infinite;
  display: inline-block;
  vertical-align: middle;
  margin-right: 5px;
}

@keyframes spin {
  to { transform: rotate(360deg); }
}
</style>
