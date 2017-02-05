<?php

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot.'/grade/grading/form/lib.php');

class gradingform_p2p_controller extends gradingform_controller {
	/**
	 * Extends the module settings navigation
	 *
	 * This function is called when the context for the page is an activity module with the
	 * FEATURE_ADVANCED_GRADING, the user has the permission moodle/grade:managegradingforms
	 * and there is an area with the active grading method set to the given plugin.
	 *
	 * @param settings_navigation $settingsnav {@link settings_navigation}
	 * @param navigation_node $node {@link navigation_node}
	 */
	public function extend_settings_navigation(settings_navigation $settingsnav, navigation_node $node=null) {
		// do not extend by default
		
		// RUBRIC:
		// $node->add(get_string('definerubric', 'gradingform_rubric'),
		//		$this->get_editor_url(), settings_navigation::TYPE_CUSTOM,
		//		null, null, new pix_icon('icon', '', 'gradingform_rubric'));
		
		// GUIDE:
		// $node->add(get_string('definemarkingguide', 'gradingform_guide'),
		//		$this->get_editor_url(), settings_navigation::TYPE_CUSTOM,
		//		null, null, new pix_icon('icon', '', 'gradingform_guide'));
	}
	
	/**
	 * Extends the module navigation
	 *
	 * This function is called when the context for the page is an activity module with the
	 * FEATURE_ADVANCED_GRADING and there is an area with the active grading method set to the given plugin.
	 *
	 * @param global_navigation $navigation {@link global_navigation}
	 * @param navigation_node $node {@link navigation_node}
	 */
	public function extend_navigation(global_navigation $navigation, navigation_node $node=null) {
		// do not extend by default
		
		// RUBRIC:
		//if (has_capability('moodle/grade:managegradingforms', $this->get_context())) {
		//	// no need for preview if user can manage forms, he will have link to manage.php in settings instead
		//	return;
		//}
		//if ($this->is_form_defined() && ($options = $this->get_options()) && !empty($options['alwaysshowdefinition'])) {
		//	$node->add(get_string('gradingof', 'gradingform_rubric', get_grading_manager($this->get_areaid())->get_area_title()),
		//			new moodle_url('/grade/grading/form/'.$this->get_method_name().'/preview.php', array('areaid' => $this->get_areaid())),
		//			settings_navigation::TYPE_CUSTOM);
		//}
		
		// GUIDE:
		// if (has_capability('moodle/grade:managegradingforms', $this->get_context())) {
		//	// No need for preview if user can manage forms, he will have link to manage.php in settings instead.
		//	return;
		//}
		//if ($this->is_form_defined() && ($options = $this->get_options()) && !empty($options['alwaysshowdefinition'])) {
		//	$node->add(get_string('gradingof', 'gradingform_guide', get_grading_manager($this->get_areaid())->get_area_title()),
		//			new moodle_url('/grade/grading/form/'.$this->get_method_name().'/preview.php',
		//					array('areaid' => $this->get_areaid())), settings_navigation::TYPE_CUSTOM);
		//}
	}
	
	/**
	 * Saves the defintion data into the database
	 *
	 * The implementation in gradingform_controller class stores the common data into the record
	 * into the {grading_definition} table. The plugins are likely to extend this
	 * and save their data into own tables, too.
	 *
	 * @param stdClass $definition data containing values for the {grading_definition} table
	 * @param int|null $usermodified optional userid of the author of the definition, defaults to the current user
	 */
	public function update_definition(stdClass $definition, $usermodified = null) {
	}
	
	/**
	 * Loads the form definition if it exists
	 *
	 * The default implementation just tries to load the record from the {grading_definitions}
	 * table. The plugins are likely to override this with a more complex query that loads
	 * all required data at once.
	 */
	protected function load_definition() {
	}
	
	/**
	 * Deletes all plugin data associated with the given form definiton
	 *
	 * @see delete_definition()
	 */
	protected function delete_plugin_definition() {
		
	}
	
	/**
	 * Returns the plugin renderer
	 *
	 * @param moodle_page $page the target page
	 * @return gradingform_p2p_renderer
	 */
	public function get_renderer(moodle_page $page) {
		return $page->get_renderer('gradingform_'. $this->get_method_name());
	}
	
	/**
	 * Returns the HTML code displaying the preview of the grading form
	 *
	 * Plugins are forced to override this. Ideally they should delegate
	 * the task to their own renderer.
	 *
	 * @param moodle_page $page the target page
	 * @return string
	 */
	public function render_preview(moodle_page $page) {
		// TODO
	}
	
	/**
	 * Prepare the part of the search query to append to the FROM statement
	 *
	 * @param string $gdid the alias of grading_definitions.id column used by the caller
	 * @return string
	 */
	public static function sql_search_from_tables($gdid) {
		// TODO
		
		// GUIDE:
		// return " LEFT JOIN {gradingform_guide_criteria} gc ON (gc.definitionid = $gdid)";
		
		// RUBRIC:
		// return " LEFT JOIN {gradingform_rubric_criteria} rc ON (rc.definitionid = $gdid)
		// LEFT JOIN {gradingform_rubric_levels} rl ON (rl.criterionid = rc.id)";
	}
	
	/**
	 * Prepare the parts of the SQL WHERE statement to search for the given token
	 *
	 * The returned array cosists of the list of SQL comparions and the list of
	 * respective parameters for the comparisons. The returned chunks will be joined
	 * with other conditions using the OR operator.
	 *
	 * @param string $token token to search for
	 * @return array
	 */
	public static function sql_search_where($token) {
		// TODO
		
		// GUIDE: TODO
		
		// RUBRIC: TODO
	}
	
	/**
	 * Returns html code to be included in student's feedback.
	 *
	 * @param moodle_page $page
	 * @param int $itemid
	 * @param array $gradinginfo result of function grade_get_grades if plugin want to use some of their info
	 * @param string $defaultcontent default string to be returned if no active grading is found or for some reason can not be shown to a user
	 * @param boolean $cangrade whether current user has capability to grade in this context
	 * @return string
	 */
	public function render_grade($page, $itemid, $gradinginfo, $defaultcontent, $cangrade) {
		// TODO
		
		// GUIDE: TODO
		// RUBRIC: TODO
	}
	
	/**
	 * Overridden by sub classes that wish to make definition details available to web services.
	 * When not overridden, only definition data common to all grading methods is made available.
	 * When overriding, the return value should be an array containing one or more key/value pairs.
	 * These key/value pairs should match the definition returned by the get_definition() function.
	 * For examples, look at:
	 *    $gradingform_rubric_controller->get_external_definition_details()
	 *    $gradingform_guide_controller->get_external_definition_details()
	 * @return array An array of one or more key/value pairs containing the external_multiple_structure/s
	 * corresponding to the definition returned by $controller->get_definition()
	 * @since Moodle 2.5
	 */
	public static function get_external_definition_details() {
		return null;
	}
	
	/**
	 * Overridden by sub classes that wish to make instance filling details available to web services.
	 * When not overridden, only instance filling data common to all grading methods is made available.
	 * When overriding, the return value should be an array containing one or more key/value pairs.
	 * These key/value pairs should match the filling data returned by the get_<method>_filling() function
	 * in the gradingform_instance subclass.
	 * For examples, look at:
	 *    $gradingform_rubric_controller->get_external_instance_filling_details()
	 *    $gradingform_guide_controller->get_external_instance_filling_details()
	 *
	 * @return array An array of one or more key/value pairs containing the external_multiple_structure/s
	 * corresponding to the definition returned by $gradingform_<method>_instance->get_<method>_filling()
	 * @since Moodle 2.6
	 */
	public static function get_external_instance_filling_details() {
		return null;
	}
}

class gradingform_p2p_instance extends gradingform_instance {
	/**
	 * Deletes this (INCOMPLETE) instance from database. This function is invoked on cancelling the
	 * grading form and/or during cron cleanup.
	 * Plugins using additional tables must override this method to remove additional data.
	 * Note that if the teacher just closes the window or presses 'Back' button of the browser,
	 * this function is not invoked.
	 */
	public function cancel() {
		// TODO
	}
	
	/**
	 * Updates the instance with the data received from grading form. This function may be
	 * called via AJAX when grading is not yet completed, so it does not change the
	 * status of the instance.
	 *
	 * @param array $elementvalue
	 */
	public function update($elementvalue) {
		// TODO
	}
	
	/**
	 * Calculates the grade to be pushed to the gradebook
	 *
	 * Returned grade must be in range $this->get_controller()->get_grade_range()
	 * Plugins must returned grade converted to int unless
	 * $this->get_controller()->get_allow_grade_decimals() is true.
	 *
	 * @return float|int
	 */
	public function get_grade() {
		return 0;
	}
	
	/**
	 * Determines whether the submitted form was empty.
	 *
	 * @param array $elementvalue value of element submitted from the form
	 * @return boolean true if the form is empty
	 */
	public function is_empty_form($elementvalue) {
		// TODO
	}
	
	/**
	 * Removes the attempt from the gradingform_*_fillings table.
	 * This function is not abstract as to not break plugins that might
	 * use advanced grading.
	 * @param array $data the attempt data
	 */
	public function clear_attempt($data) {
		// TODO
	}
	
	/**
	 * Returns html for form element of type 'grading'. If there is a form input element
	 * it must have the name $gradingformelement->getName().
	 * If there are more than one input elements they MUST be elements of array with
	 * name $gradingformelement->getName().
	 * Example: {NAME}[myelement1], {NAME}[myelement2][sub1], {NAME}[myelement2][sub2], etc.
	 * ( {NAME} is a shortcut for $gradingformelement->getName() )
	 * After submitting the form the value of $_POST[{NAME}] is passed to the functions
	 * validate_grading_element() and submit_and_get_grade()
	 *
	 * Plugins may use $gradingformelement->getValue() to get the value passed on previous
	 * form submit
	 *
	 * When forming html it is a plugin's responsibility to analyze flags
	 * $gradingformelement->_flagFrozen and $gradingformelement->_persistantFreeze:
	 *
	 * (_flagFrozen == false) => form element is editable
	 *
	 * (_flagFrozen == false && _persistantFreeze == true) => form element is not editable
	 * but all values are passed as hidden elements
	 *
	 * (_flagFrozen == false && _persistantFreeze == false) => form element is not editable
	 * and no values are passed as hidden elements
	 *
	 * Plugins are welcome to use AJAX in the form element. But it is strongly recommended
	 * that the grading only becomes active when teacher presses 'Submit' button (the
	 * method submit_and_get_grade() is invoked)
	 *
	 * Also client-side JS validation may be implemented here
	 *
	 * @see MoodleQuickForm_grading in lib/form/grading.php
	 *
	 * @param moodle_page $page
	 * @param MoodleQuickForm_grading $gradingformelement
	 * @return string
	 */
	public function render_grading_element($page, $gradingformelement) {
		// TODO
	}
	
	/**
	 * Server-side validation of the data received from grading form.
	 *
	 * @param mixed $elementvalue is the scalar or array received in $_POST
	 * @return boolean true if the form data is validated and contains no errors
	 */
	public function validate_grading_element($elementvalue) {
		// TODO
	}
	
	/**
	 * Returns the error message displayed if validation failed.
	 * If plugin wants to display custom message, the empty string should be returned here
	 * and the custom message should be output in render_grading_element()
	 *
	 * Please note that in assignments grading in 2.2 the grading form is not validated
	 * properly and this message is not being displayed.
	 *
	 * @see validate_grading_element()
	 * @return string
	 */
	public function default_validation_error_message() {
		// TODO
	}
}