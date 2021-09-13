<template>
  <EditorContent :editor="editor" />
</template>


<script>
import { useEditor, EditorContent } from "@tiptap/vue-3";
import StarterKit from "@tiptap/starter-kit";
import { watch } from "@vue/runtime-core";

export default {
  components: {
    EditorContent,
  },

  props: {
    modelValue: {
      type: String,
      default: "",
    },
    excerptValue: {
      type: String,
      default: "",
    },
  },

  setup(props, { emit }) {
    const editor = useEditor({
      content: props.modelValue,
      extensions: [StarterKit],

      editorProps: {
        attributes: {
          class:
            "min-w-full w-full focus:outline-none prose prose-sm sm:prose lg:prose-lg xl:prose-xl",
        },
        modelValue: {
          type: String,
          default: "",
        },
      },

      onUpdate: (context) => {
        const excerpt = context.editor.state.doc.content.content.find(
          (expt) => expt.type.name === "paragraph"
        );

        emit("update:excerptValue", excerpt.textContent);
        emit("update:modelValue", context.editor.getHTML());
      },
    });

    watch(
      () => props.modelValue,
      (value) => {
        if (editor.value.getHTML() === value) {
          return;
        }
        editor.value.commands.setContent(props.modelValue);
      }
    );

    return { editor };
  },
};
</script>