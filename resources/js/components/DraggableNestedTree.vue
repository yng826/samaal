<!-- Demo5Draggable.vue -->
<template>
    <div id="treeMenu">
        <Tree :value="treeData" @change="treeTmp">
            <span slot-scope="{node, index, path, tree}">
                <b @click="tree.toggleFold(node, path)"
                    class="fa"
                    :key="index"
                    :class="[
                    node.$folded ? 'fa-plus-circle text-yellow' : 'fa-minus-circle text-blue'
                    ]">
                </b>
                {{node.name}}
                <a class="btn btn-outline-warning btn-xs" :href="'/admin/menu/' + node.id + '/edit'">수정</a>
                <a class="btn btn-outline-info btn-xs" :href="'/admin/menu/create?parent_id=' + node.id + '&depth=' + node.depth">하위 추가</a>
            </span>
        </Tree>

        <input type="hidden" name="id" v-model="id">
        <input type="hidden" name="depth" v-model="depth">
        <input type="hidden" name="parent_id" v-model="parent_id">
    </div>
</template>

<script>
import 'he-tree-vue/dist/he-tree-vue.css'
import {Tree, Draggable, Fold} from 'he-tree-vue'

export default {
    props: {
        items: {
            type: Array
        },
    },
    components: {
        Tree: Tree.mixPlugins([Draggable, Fold])
    },
    data() {
        return {
            treeData: this.items,
            id: '', //자신 아이디
            depth: '', //자신 위치
            parent_id: '' //부모 아이디
        }
    },
    mounted: function() {
        this.treeTmp();
    },
    methods: {
        treeTmp() {
            this.id = ''; //자신 아이디
            this.depth = ''; //자신 위치
            this.parent_id = ''; //부모 아이디

            this.treeData.forEach(element => {
                let depth = 1;

                this.id += element.id + ',';
                this.depth += depth + ',';
                this.parent_id += 0 + ',';

                this.getChildrens(element, depth);
            });
        },

        getChildrens(element, depth) {
            if (element.children != null) {
                const parent_id = element.id;
                depth++;

                element.children.forEach(element => {
                    this.id += element.id + ',';
                    this.depth += depth + ',';
                    this.parent_id += parent_id + ',';

                    this.getChildrens(element, depth);
                });
            }
        }
    }
}
</script>
