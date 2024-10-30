"use strict";

jQuery(function ($) {
  $('a.view-all-customer-orders, a.view-all-linked-orders').each(function () {
    $(this).attr('target', '_blank');
  });
});
//# sourceMappingURL=orders-list-table.js.map
