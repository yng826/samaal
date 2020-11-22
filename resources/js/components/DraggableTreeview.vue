<template>
<v-draggable-treeview v-model="items">
    <template v-slot:prepend="{  }">
        <v-icon>mdi-file</v-icon>
    </template>
    <template v-slot:label="{ item }">
        <span class="primary--text">
            {{ item.name }}
            <input type="hidden" name="id" :value="item.id">
            <a class="btn btn-outline-warning btn-xs" :href="'/admin/menu/' + item.id + '/edit'">수정</a>
            <a class="btn btn-outline-info btn-xs" :href="'/admin/menu/create?parent_id=' + item.id + '&depth=' + item.depth">하위 추가</a>
        </span>
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
    props: {
        items: {
            type: Array
        },
    },
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
      items: this.items
    }
  }
});
</script>
