<template></template>
<script>
export default {
  name: 'Notification',
  methods: {
    displayNotification(notiType,notititle,notimessage){
      this.$notify({
        group: 'foo',
        type:notiType,
        title:notititle,
        text: notimessage
      })
    }
  }
}
</script>
