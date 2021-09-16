
<template>
    <div>
        <div class="form-group row justify-content-center">
            <div class="channel-avatar">
                <img src="" alt="" style="width:100%;height:100%;position:absolute;width:100px;height:100px;">

                    <div class="channel-avatar-overlay"
                        onclick="document.getElementById('image').click()">
                            <i class="fas fa-camera fa-4x m-auto"></i>
                    </div>
            </div>
        </div>
        <input type="file" class="" name="image" id="image" style="display:none;"
        onchange="document.getElementById('form').submit()">
    </div>
</template>
<script>
export default {

}
</script>
<style lang="scss" scoped>
.channel-avatar {
    width: 100px;
    height: 100px;
    border: 1px solid rgba(0, 0, 0, 0.125);
    cursor: pointer;
    .channel-avatar-overlay {
        display:none;
    }

    &:hover{
        .channel-avatar-overlay {
            position: relative;
            height: 100%;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            display: flex;
            justify-content: center;
        }

    }
}
</style>
