<template>
    <!--begin::Row-->
    <div class="row gx-5 gx-xl-10">
        <OrderList></OrderList>
        <OrderDetail></OrderDetail>
    </div>
    <!--end::Row-->
</template>
<script >
import OrderDetail from "./OrderDetail.vue";
import OrderList from "./OrderList.vue";
export default {
    components: {
        OrderDetail,
        OrderList
    }
}
</script>