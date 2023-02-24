import Vuex from 'vuex';
import Vue from 'vue';
Vue.use(Vuex)
const state = {
    cart: {
      items: []
    }
  };

  const getters = {
    cartItems: (state) => state.cart.items,
    cartTotal: (state) => {
      return state.cart.items.reduce(
        (total, item) => total + item.quantity * item.price,
        0
      );
    },
    cartQuantity: (state) => {
      return state.cart.items.reduce((total, item) => total + item.quantity, 0);
    },
  };

  const actions = {
    addToCart({ state, commit }, payload) {
      const item = state.cart.items.find((item) => item.id === payload.id);

      if (!item) {
        commit("ADD_ITEM", payload);
      } else {
        commit("INCREMENT_ITEM_QUANTITY", item);
      }
    },

    removeFromCart({ commit }, payload) {
      commit("REMOVE_ITEM", payload);
    },

    incrementItemQuantity({ commit }, payload) {
      commit("INCREMENT_ITEM_QUANTITY", payload);
    },

    decrementItemQuantity({ commit }, payload) {
      commit("DECREMENT_ITEM_QUANTITY", payload);
    },

    clearCart({ commit }) {
      commit("CLEAR_CART");
    },
  };

  const mutations = {
    ADD_ITEM(state, payload) {
      state.cart.items.push({
        id: payload.id,
        name: payload.name,
        price: payload.price,
        quantity: 1,
      });
    },

    REMOVE_ITEM(state, payload) {
        state.cart.items = state.cart.items.filter((item) => item !== payload);
      },

    INCREMENT_ITEM_QUANTITY(state, payload) {
      payload.quantity++;
    },

    DECREMENT_ITEM_QUANTITY(state, payload) {
      if (payload.quantity > 1) {
        payload.quantity--;
      }
    },

    CLEAR_CART(state) {
      state.cart.items = [];
    },
  };

  export default new Vuex.Store({
  state,
  getters,
  actions,
  mutations
});