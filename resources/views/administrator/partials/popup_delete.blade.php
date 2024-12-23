<script>
    deleteModal.addEventListener("show.bs.modal", (e) => {
        const button = e.relatedTarget
        deleteForm.action = button.dataset.route
    })
</script>
