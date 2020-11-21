<template>
<v-draggable-treeview v-model="items" group="hoge">
  <template v-slot:prepend="{  }">
    <v-icon>mdi-file</v-icon>
  </template>
  <template v-slot:label="{ item }">
    <span class="primary--text">{{ item.name }}</span>
  </template>
  <template v-slot:append="{ item }">
    <template
            v-if="item.children != null && item.children.length > 0"
    >
      has {{ item.children.length }} children
    </template>
  </template>
</v-draggable-treeview>
</template>

<script>

import draggable from "vuedraggable";
import VuetifyDraggableTreeview from 'vuetify-draggable-treeview'
import '@mdi/font/css/materialdesignicons.css' // Ensure you are using css-loader
// import 'material-design-icons-iconfont/dist/material-design-icons.css'

// import VuetifyDraggableTreeview from 'vuetify-draggable-treeview'
import Vuetify from 'vuetify';
// import "vuetify/dist/vuetify.css";
Vue.use(VuetifyDraggableTreeview);

export default Vue.extend({
    components: {
        // draggable,
        VuetifyDraggableTreeview
    },
    vuetify: new Vuetify({
        icons: {
            iconfont: 'mdiSvg'
        }
        // theme: { dark: true },
    }),
  data() {
    return {
      items: [
          { id: 1,
          name: "elit",
          children: [{ id:11, name: "hoge-child1" }] },
          { id: 2,
          name: "Magna",
          children: [
              { id:21, name: "hoge-child21" },
              { id:22, name: "hoge-child22" }
            ] },
          { id: 3,
          name: "TEST",
          children: [
              { id:31, name: "hoge-child31" },
              { id:32, name: "hoge-child32" }
            ] },
        ],
        dragged() {
            console.log('dragged');
        }
    }
  }
});
</script>
