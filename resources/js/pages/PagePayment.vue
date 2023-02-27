<template>
  <div>
    <!-- <div id="dropin-container"></div>
    <button @click="submitPayment">Pay Now</button> -->

    ciaooooooooo
  </div>
</template>

<script>
import braintree from 'braintree-web';

export default {
  data() {
    return {
      clientToken: '',
      braintreeInstance: null,
    };
  },
  mounted() {
    // Richiedi il token client a tua API
    axios.get('https://api.braintreegateway.com/merchants/cp2srmr8wt7j2hmc/client_token?publicKey=58dwsswxyww4pqxb')
      .then(response => {
        // Inizializza Braintree
        this.clientToken = response.data.token;
        braintree.create({
          authorization: this.clientToken,
        }, (braintreeErr, instance) => {
          if (braintreeErr) {
            console.error('Braintree initialization failed', braintreeErr);
            return;
          }
          this.braintreeInstance = instance;
        });
      })
      .catch(error => console.error(error));
  },
  methods: {
    // Gestisci la chiamata al metodo di pagamento
    submitPayment() {
      this.braintreeInstance.requestPaymentMethod((requestPaymentMethodErr, payload) => {
        if (requestPaymentMethodErr) {
          console.error('Request payment method failed', requestPaymentMethodErr);
          return;
        }
        // Invia il payload con il metodo di pagamento a tua API per la transazione
        axios.post('/process-payment', { paymentMethodNonce: payload.nonce })
          .then(response => {
            console.log('Payment processed successfully');
          })
          .catch(error => console.error(error));
      });
    },
  },
};
</script>

<style lang="scss">
    // @import 'braintree-web/dist/braintree.css';

</style>
