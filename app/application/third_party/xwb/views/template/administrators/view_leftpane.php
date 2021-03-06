<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="left_col scroll-view">
  <div class="navbar nav_title" style="border: 0;">
    <a href="<?php echo base_url(''); ?>" class="site_title">
      <?php if (getConfig('logo_to_use') == 'logo') : ?>
        <div id="preview" class="center">
          <img src="<?php echo base_url('view_image?path=' . getConfig('logo')); ?>" alt="<?php echo (getConfig('company_name') == '' ? lang('lbl_company_name') : getConfig('company_name')); ?>" class="img-responsive" id="company_logo">
        </div>
      <?php else : ?>
        <h3 class="compony_logo_name">
          <?php echo (getConfig('company_name') == '' ? lang('lbl_company_name') : getConfig('company_name')); ?>
        </h3>
      <?php endif; ?>
    </a>
  </div>

  <div class="clearfix"></div>

  <!-- menu profile quick info -->
  <div class="profile clearfix">
    <div class="profile_pic">
      <img src="data:image/jpeg;base64,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" alt="..." class="img-circle profile_img" width="80%" height="60px">
    </div>
    <div class="profile_info">
      <span><?php echo lang('lbl_welcome'); ?>,</span>
      <h2><?php echo $current_user->first_name; ?></h2>
    </div>
  </div>
  <!-- /menu profile quick info -->

  <br />

  <!-- sidebar menu -->
  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3><?php echo lang('lbl_menu'); ?></h3>
      <ul class="nav side-menu">
        <li><a href="<?php echo base_url('/'); ?>"><i class="fa fa-laptop"></i> <?php echo lang('dashboard_page_title'); ?> </a></li>
        <li><a href="<?php echo base_url('purchase_order'); ?>"><i class="fa fa-barcode"></i> <?php echo lang('po_page_title'); ?> </a></li>
        <li><a href="javascript:;"><i class="fa fa-list"></i> <?php echo lang('request_label'); ?>
            <span class="badge badge-success pull-right">
              <?php echo $notification->admin_req_action; ?>
            </span>
            <span class="fa fa-chevron-down"></span>
          </a>
          <ul class="nav child_menu">
            <li><a href="<?php echo base_url('request/reqlist'); ?>"><?php echo lang('request_list_page_title'); ?>
                <span class="badge badge-success pull-right"><?php echo $notification->admin_req_action; ?></span>
              </a></li>
            <li><a href="<?php echo base_url('request/newreq'); ?>"><?php echo lang('menu_request_new'); ?> </a></li>
            <li><a href="<?php echo base_url('request/archived'); ?>"><?php echo lang('menu_archive'); ?></a></li>
          </ul>
        </li>
        <li>
          <a href="/">
            <i class="fa fa-sign-out"></i> Products Request
          </a>
        </li>
        <?php if ($current_user->department_head == 1) : ?>
          <li><a href="<?php echo base_url('admin/for_approval'); ?>"><i class="fa fa-check-circle"></i> <?php echo lang('menu_head_approval'); ?> <span class="badge badge-success pull-right"><?php echo $notification->head_approval_action; ?></span></a></li>
        <?php endif; ?>
        <li><a href="<?php echo base_url('board'); ?>"><i class="fa fa-mortar-board"></i> <?php echo lang('menu_board_approval'); ?>
            <span class="badge badge-success pull-right"><?php echo $notification->admin_board_action; ?></span>
          </a></li>
        <li><a href="<?php echo base_url('history'); ?>"><i class="fa fa-history"></i> <?php echo lang('menu_history'); ?></a></li>
        <li>
          <a href="<?php echo base_url('report'); ?>">
            <i class="fa fa-bar-chart"></i>
            <!-- <?php echo lang('menu_reports'); ?>  -->
            Report
          </a>
          <!-- <span class="fa fa-chevron-down"></span> -->
          <!-- <ul class="nav child_menu">
            <li><a href="<?php echo base_url('reports/request'); ?>"><?php echo lang('reqreport_page_title'); ?> </a></li>
            <li><a href="<?php echo base_url('reports/items'); ?>"><?php echo lang('menu_item_reports'); ?> </a></li>
            <li><a href="<?php echo base_url('reports/po'); ?>"><?php echo lang('po_report_page_title'); ?></a></li>
          </ul> -->
        </li>
        <li><a href="javascript:;"><i class="fa fa-cog"></i> <?php echo lang('settings_page_title'); ?> <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="<?php echo base_url('settings'); ?>"> <?php echo lang('menu_gen_settings'); ?> </a></li>
            <li><a href="<?php echo base_url('settings/emails'); ?>"> <?php echo lang('emails_page_title'); ?> </a></li>
            <li><a href="<?php echo base_url('user'); ?>"> <?php echo lang('page_user_title'); ?> </a></li>
            <li><a href="<?php echo base_url('user_group'); ?>"> <?php echo lang('page_ugroup_title'); ?> </a></li>
            <li><a href="<?php echo base_url('department'); ?>"> <?php echo lang('page_department_title'); ?> </a></li>
            <li><a href="<?php echo base_url('branch'); ?>"> <?php echo lang('page_branch_title'); ?> </a></li>
            <li><a href="<?php echo base_url('supplier'); ?>"> <?php echo lang('page_supplier_title'); ?></a></li>
            <li><a href="<?php echo base_url('product'); ?>"> <?php echo lang('page_product_title'); ?></a></li>
            <li><a href="<?php echo base_url('product_category'); ?>"> <?php echo lang('page_productcat_title'); ?> </a></li>
            <li><a href="<?php echo base_url('request_category'); ?>"> <?php echo lang('page_reqcat_title'); ?></a></li>
            <li><a href="<?php echo base_url('settings/status'); ?>"> <?php echo lang('menu_status'); ?></a></li>
          </ul>
        </li>
        <li>
          <a href="inv" style="background: repeating-linear-gradient(45deg, #0000008c, transparent 100px);border-radius: 100px;">
            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
              <path fill="currentColor" d="M19 3H14.82C14.4 1.84 13.3 1 12 1S9.6 1.84 9.18 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3M7 8H9V12H8V9H7V8M10 17V18H7V17.08L9 15H7V14H9.25C9.66 14 10 14.34 10 14.75C10 14.95 9.92 15.14 9.79 15.27L8.12 17H10M11 4C11 3.45 11.45 3 12 3S13 3.45 13 4 12.55 5 12 5 11 4.55 11 4M17 17H12V15H17V17M17 11H12V9H17V11Z" />
            </svg>
            <span style="position: relative;top: -5px;">GO TO INVENTORY</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
  <!-- /sidebar menu -->

  <!-- /menu footer buttons -->
  <div class="sidebar-footer hidden-small">
    <a data-toggle="tooltip" data-placement="top" title="Settings" href="<?php echo base_url('settings'); ?>">
      <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Profile" href="<?php echo base_url('profile'); ?>">
      <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Help" href="<?php echo base_url('help'); ?>">
      <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo base_url('user/auth/logout'); ?>">
      <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
    </a>
  </div>
  <!-- /menu footer buttons -->
</div>
</div>