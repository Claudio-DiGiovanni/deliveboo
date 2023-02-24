const state = {
    items: [],
  };

  const getters = {
    cartItems: (state) => state.items,
    cartTotal: (state) => {
      return state.items.reduce(
        (total, item) => total + item.quantity * item.price,
        0
      );
    },
    cartQuantity: (state) => {
      return state.items.reduce((total, item) => total + item.quantity, 0);
    },
  };

  const actions = {
    addToCart({ state, commit }, payload) {
      const item = state.items.find((item) => item.id === payload.id);

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
      state.items.push({
        id: payload.id,
        name: payload.name,
        price: payload.price,
        quantity: 1,
      });
    },

    REMOVE_ITEM(state, payload) {
      state.items.splice(payload.index, 1);
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
      state.items = [];
    },
  };

  export default {
    state,
    getters,
    actions,
    mutations,
  };
