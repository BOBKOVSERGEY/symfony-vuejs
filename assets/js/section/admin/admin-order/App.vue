<template>
  <div>
    vue app {{ testProperty }}
  </div>
</template>

<script>
import { mapState } from "vuex";
  export default {
    created() {
      console.log(ORDER_PRODUCT);
    },
    computed: {
      ...mapState('products', ['testProperty']),
      productsCount: () => {
        return 123;
      }
    }
  }
</script>