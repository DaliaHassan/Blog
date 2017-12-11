/* globals define */
define(['jquery', 'bootstrap-modal', 'bootstrap-select', 'uniform'], function ($) {
  'use strict';
  /**
  Core script to handle the entire theme and core functions
  **/

  var Api = function () {

    var API = {};

    API['update-status'] = function (el) {
      var id = $(el).data('id');
      var status = $(el).closest('tr').find('.status').text();
      var $modal = $('#update-status');
      $modal.find('.order-number').text(id);
      $modal.find('.order-status').text(status);
      $modal.modal('show');
    };

    API['view-details'] = function () {
      // Ajax requesst to get full order details
      var $modal = $('#view-details');
      $modal.modal('show');
    };

    API['reset-form'] = function (el) {
      var $form = $(el).closest('form');
      $form.find('input').each(function () {
        $(this).val('');
      });
      $form.find('input[type="checkbox"]').each(function () {
        $(this).prop('checked', false);
      });
      $.uniform.update($form.find('input[type="checkbox"]'));
      $form.find('select').each(function () {
        $(this).val('');
      });
      $form.find('.bs-select').each(function () {
        $(this).selectpicker('refresh');
      });
    };

    API['add-template'] = function (el) {
      var $template = $(el).closest('fieldset').find('.template:last');
      var $clone = $template.clone();
      $clone.find('input').each(function (index, el) {
        $(this).val('');
      });
      $template.after($clone);
    };

    API['prepare-active-groups'] = function (el) {
      var $groups = $(el).find('.group');
      $groups.each(function () {
        var $radio = $(this).find('[data-change]');
        if (!$radio.is(':checked')) {
          $(this).find('input').not('[data-change]').each(function () {
            $(this).prop('disabled', true);
          });
          $(this).find('select').each(function () {
            $(this).prop('disabled', true);
          });
          $(this).find('button').each(function () {
            $(this).prop('disabled', true);
          });
        } else {
          $(this).find(':disabled').each(function () {
            $(this).prop('disabled', false);
          });
        }
      });
    };

    API['trigger-group-state'] = function (el) {
      var $groups = $(el).closest('.groups');
      if ($groups.length > 0) {
        API['prepare-active-groups']($groups[0]);
      }
    };

    var handleInit = function () {
      $(document).on('click', '[data-action]', function (ev) {
        ev.preventDefault();
        var action = $(this).data('action');
        API[action](this);
      });
      $(document).on('change', '[data-change]', function (ev) {
        ev.preventDefault();
        var action = $(this).data('change');
        API[action](this);
      });
      $(document).ready(function () {
        $('[data-ready]').each(function () {
          var action = $(this).data('ready');
          API[action](this);
        });
      });
      $(document).on('click', '.dataTable input[value="Delete"]', function(ev) {
        ev.preventDefault();
        var confirmation = confirm('Are you sure you want to delete this?');
        if (confirmation) {
          $(this).closest('form').submit();
        }
      });
    };

    return {

      init: function () {
        handleInit();
      }

    };
  }();
  return Api;
});
