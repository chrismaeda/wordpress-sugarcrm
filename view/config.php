<div class=wrap>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript" src="http://jzaefferer.github.com/jquery-validation/jquery.validate.js"></script>

<script>
	$(document).ready(function(){
    $("#frmcrm").validate();
  });
</script>
<style>
	.error{
		color:red;
	}
</style>
<form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>" id="frmcrm">
<h2><?php echo SK_PLUGIN_NAME; ?> - Setting</h2>
<table class="form-table">
<tbody>
<tr valign="top">
<th scope="row"><label for="crm_url">URL</label></th>
<td><input type="text" name="crm_url" id="crm_url" class="required" value="<?php _e(apply_filters('format_to_edit',$devOptions['crm_url']), 'Sync_SugarCRM_Users') ?>" class="regular-text" /> &nbsp;<!--<span class="description"><?php _e('eg: http://example.com/crm/.', 'Sync_SugarCRM_Users') ?></span>--></td>
</th>
</tr>
<tr valign="top">
<th scope="row"><label for="crm_user_name">Username</label></th>
<td><input type="text" name="crm_user_name" id="crm_user_name"  value="<?php _e(apply_filters('format_to_edit',$devOptions['crm_user_name']), 'Sync_SugarCRM_Users') ?>" class="regular-text required" /></td>
</tr>
<tr>
<th scope="row"><label for="crm_user_hash">Password</label></th>
<td><input type="" name="crm_user_hash"  id="crm_user_hash" value="" class="regular-text required" autocomplete="off" /></td>
</tr>
<tr>
<th scope="row"><label for="crm_auto_create_user">Auto insert user to CRM Register</label></th>
<td><input type="checkbox" name="crm_auto_create_user" id="crm_auto_create_user" value="1" <?php if ($devOptions['crm_auto_create_user']) echo 'checked="checked"'; ?> /> &nbsp;<span class="description"><?php _e('', 'Sync_SugarCRM_Users') ?></span></td>
</tr>
<tr>
<th scope="row"></th>
<td>
<input type="radio" name="crm_auto_create_module" id="crm_auto_create_module_users" value="Users" <?php if ($devOptions['crm_auto_create_module'] == 'Users' || ! in_array($devOptions['crm_auto_create_module'], array('Accounts', 'Contacts', ))) echo 'checked="checked"'; ?> />&nbsp;<label for="crm_auto_create_module_users"><?php _e('Users', 'Sync_SugarCRM_Users') ?></label>&nbsp;&nbsp;&nbsp;
<input type="radio" name="crm_auto_create_module" id="crm_auto_create_module_accounts" value="Accounts" <?php if ($devOptions['crm_auto_create_module'] == 'Accounts') echo 'checked="checked"'; ?> />&nbsp;<label for="crm_auto_create_module_accounts"><?php _e('Accounts', 'Sync_SugarCRM_Users') ?></label>&nbsp;&nbsp;&nbsp;
<input type="radio" name="crm_auto_create_module" id="crm_auto_create_module_contacts" value="Contacts" <?php if ($devOptions['crm_auto_create_module'] == 'Contacts') echo 'checked="checked"'; ?> />&nbsp;<label for="crm_auto_create_module_contacts"><?php _e('Contacts', 'Sync_SugarCRM_Users') ?></label>&nbsp;
<input type="radio" name="crm_auto_create_module" id="crm_auto_create_module_leads" value="Leads" <?php if ($devOptions['crm_auto_create_module'] == 'Leads') echo 'checked="checked"'; ?> />&nbsp;<label for="crm_auto_create_module_leads"><?php _e('Leads', 'Sync_SugarCRM_Users') ?></label>
</td>
</tr>

</tbody>
</table>
<p class="submit">
<input type="submit" name="update_sync_sugarcrm_users_parameters" class="button-primary" value="<?php _e('Save Changes', 'Sync_SugarCRM_Users') ?>" /></p>
</form>
 </div>
