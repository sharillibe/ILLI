<?PHP
	NAMESPACE ILLI\Core\Util\Html;
	
	CLASS __addr_Attributes
	{
		CONST GLOB_accessKey				= 0x00;
		CONST GLOB_class				= 0x01;
		CONST GLOB_contentEditable			= 0x02;
		CONST GLOB_contextMenu				= 0x03;
		CONST GLOB_data					= 0x04;
		CONST GLOB_dir					= 0x05;
		CONST GLOB_draggable				= 0x06;
		CONST GLOB_dropzone				= 0x07;
		CONST GLOB_hidden				= 0x08;
		CONST GLOB_id					= 0x09;
		CONST GLOB_itemId				= 0x0A;
		CONST GLOB_itemProp				= 0x0B;
		CONST GLOB_itemRef				= 0x0C;
		CONST GLOB_itemScope				= 0x0D;
		CONST GLOB_itemType				= 0x0E;
		CONST GLOB_lang					= 0x0F;
		CONST GLOB_spellCheck				= 0x10;
		CONST GLOB_style				= 0x11;
		CONST GLOB_tabIndex				= 0x12;
		CONST GLOB_title				= 0x13;
		
		#:A:
			CONST A_download			= 0x14;
			CONST A_href				= 0x15;
			CONST A_hrefLang			= 0x16;
			CONST A_media				= 0x17;
			CONST A_ping				= 0x18;
			CONST A_rel				= 0x19;
			CONST A_target				= 0x1A;
			CONST A_type				= 0x1B;
		#::
		
		#:Area:
			CONST AREA_alt				= 0x14;
			CONST AREA_coords			= 0x15;
			CONST AREA_download			= 0x16;
			CONST AREA_href				= 0x17;
			CONST AREA_hrefLang			= 0x18;
			CONST AREA_media			= 0x19;
			CONST AREA_shape			= 0x1A;
			CONST AREA_rel				= 0x1B;
			CONST AREA_target			= 0x1C;
			CONST AREA_type				= 0x1D;
		#::
		
		#:Audio:
			CONST AUDIO_autoPlay			= 0x14;
			CONST AUDIO_buffered			= 0x15;
			CONST AUDIO_controls			= 0x16;
			CONST AUDIO_loop			= 0x17;
			CONST AUDIO_muted			= 0x18;
			CONST AUDIO_played			= 0x19;
			CONST AUDIO_preload			= 0x1A;
			CONST AUDIO_src				= 0x1B;
		#::
		
		#:Base:
			CONST BASE_href				= 0x14;
			CONST BASE_target			= 0x15;
		#::
		
		#:Blockquote:
			CONST BLOCKQUOTE_cite			= 0x14;
		#::
		
		#:Body:
			CONST BODY_onAfterPrint			= 0x14;
			CONST BODY_onBeforePrint		= 0x15;
			CONST BODY_onBeforeUnload		= 0x16;
			CONST BODY_onBlur			= 0x17;
			CONST BODY_onError			= 0x18;
			CONST BODY_onFocus			= 0x19;
			CONST BODY_onHashChange			= 0x1A;
			CONST BODY_onLoad			= 0x1B;
			CONST BODY_onMessage			= 0x1C;
			CONST BODY_onOffline			= 0x1D;
			CONST BODY_onOnline			= 0x1E;
			CONST BODY_onPopState			= 0x1F;
			CONST BODY_onRedo			= 0x20;
			CONST BODY_onResize			= 0x21;
			CONST BODY_onStorage			= 0x22;
			CONST BODY_onUndo			= 0x23;
			CONST BODY_onUnload			= 0x24;
		#::
		
		#:Button:
			CONST BUTTON_autoFocus			= 0x14;
			CONST BUTTON_disabled			= 0x15;
			CONST BUTTON_form			= 0x16;
			CONST BUTTON_formAction			= 0x17;
			CONST BUTTON_formEncType		= 0x18;
			CONST BUTTON_formMethod			= 0x19;
			CONST BUTTON_formNoValidate		= 0x1A;
			CONST BUTTON_formTarget			= 0x1B;
			CONST BUTTON_name			= 0x1C;
			CONST BUTTON_type			= 0x1D;
			CONST BUTTON_value			= 0x1E;
		#::
		
		#:Canvas:
			CONST CANVAS_height			= 0x14;
			CONST CANVAS_width			= 0x15;
		#::
		
		#:Col:
			CONST COL_span				= 0x14;
		#::
		
		#:Colgroup:
			CONST COLGROUP_span			= 0x14;
		#::
		
		#:Command:
			CONST COMMAND_checked			= 0x14;
			CONST COMMAND_disabled			= 0x15;
			CONST COMMAND_icon			= 0x16;
			CONST COMMAND_label			= 0x17;
			CONST COMMAND_radioGroup		= 0x18;
			CONST COMMAND_type			= 0x19;
		#::
		
		#:Data:
			CONST DATA_value			= 0x14;
		#::
		
		#:Del:
			CONST DEL_cite				= 0x14;
			CONST DEL_dateTime			= 0x15;
		#::
		
		#:Data:
			CONST DETAILS_open			= 0x14;
		#::
		
		#:Embed:
			CONST EMBED_height			= 0x14;
			CONST EMBED_src				= 0x15;
			CONST EMBED_type			= 0x16;
			CONST EMBED_width			= 0x17;
		#::
		
		#:Fieldset:
			CONST FIELDSET_disabled			= 0x14;
			CONST FIELDSET_form			= 0x15;
			CONST FIELDSET_name			= 0x16;
		#::
		
		#:Form:
			CONST FORM_acceptCharset		= 0x14;
			CONST FORM_action			= 0x15;
			CONST FORM_autoComplete			= 0x16;
			CONST FORM_encType			= 0x17;
			CONST FORM_method			= 0x18;
			CONST FORM_name				= 0x19;
			CONST FORM_noValidate			= 0x1A;
			CONST FORM_target			= 0x1B;
		#::
		
		#:Iframe:
			CONST IFRAME_allowFullScreen		= 0x14;
			CONST IFRAME_height			= 0x15;
			CONST IFRAME_name			= 0x16;
			CONST IFRAME_sandbox			= 0x17;
			CONST IFRAME_seamless			= 0x18;
			CONST IFRAME_src			= 0x19;
			CONST IFRAME_width			= 0x1A;
		#::
		
		#:Img:
			CONST IMG_alt				= 0x14;
			CONST IMG_crossOrigin			= 0x15;
			CONST IMG_height			= 0x16;
			CONST IMG_isMap				= 0x17;
			CONST IMG_src				= 0x18;
			CONST IMG_width				= 0x19;
			CONST IMG_useMap			= 0x1A;
		#::
		
		#:Input:
			CONST INPUT_accept			= 0x14;
			CONST INPUT_autoComplete		= 0x15;
			CONST INPUT_autoFocus			= 0x16;
			CONST INPUT_autoSave			= 0x17;
			CONST INPUT_checked			= 0x18;
			CONST INPUT_disabled			= 0x19;
			CONST INPUT_form			= 0x1A;
			CONST INPUT_formAction			= 0x1B;
			CONST INPUT_formEncType			= 0x1C;
			CONST INPUT_formMethod			= 0x1D;
			CONST INPUT_formNoValidate		= 0x1E;
			CONST INPUT_formTarget			= 0x1F;
			CONST INPUT_height			= 0x20;
			CONST INPUT_inputMode			= 0x21;
			CONST INPUT_list			= 0x22;
			CONST INPUT_max				= 0x23;
			CONST INPUT_maxLength			= 0x24;
			CONST INPUT_min				= 0x25;
			CONST INPUT_multiple			= 0x26;
			CONST INPUT_name			= 0x27;
			CONST INPUT_pattern			= 0x28;
			CONST INPUT_placeHolder			= 0x29;
			CONST INPUT_readOnly			= 0x2A;
			CONST INPUT_required			= 0x2B;
			CONST INPUT_selectionDirection		= 0x2C;
			CONST INPUT_size			= 0x2D;
			CONST INPUT_src				= 0x2E;
			CONST INPUT_step			= 0x2F;
			CONST INPUT_type			= 0x30;
			CONST INPUT_value			= 0x31;
			CONST INPUT_width			= 0x32;
		#::
		
		#:Ins:
			CONST INS_cite				= 0x14;
			CONST INS_dateTime			= 0x15;
		#::
		
		#:Keygen:
			CONST KEYGEN_autoFocus			= 0x14;
			CONST KEYGEN_challenge			= 0x15;
			CONST KEYGEN_disabled			= 0x16;
			CONST KEYGEN_form			= 0x17;
			CONST KEYGEN_keyType			= 0x18;
			CONST KEYGEN_name			= 0x19;
		#::
		
		#:Label:
			CONST LABEL_for				= 0x14;
			CONST LABEL_form			= 0x15;
		#::
		
		#:Li:
			CONST LI_value				= 0x14;
		#::
		
		#:Link:
			CONST LINK_crossOrigin			= 0x14;
			CONST LINK_href				= 0x15;
			CONST LINK_hrefLang			= 0x16;
			CONST LINK_media			= 0x17;
			CONST LINK_rel				= 0x18;
			CONST LINK_sizes			= 0x19;
			CONST LINK_type				= 0x1A;
		#::
		
		#:Map:
			CONST MAP_name				= 0x14;
		#::
		
		#:Menu:
			CONST MENU_type				= 0x14;
			CONST MENU_label			= 0x15;
		#::
		
		#:Meta:
			CONST META_charset			= 0x14;
			CONST META_content			= 0x15;
			CONST META_httpEquiv			= 0x16;
			CONST META_name				= 0x17;
		#::
		
		#:Meter:
			CONST METER_form			= 0x14;
			CONST METER_high			= 0x15;
			CONST METER_low				= 0x16;
			CONST METER_max				= 0x17;
			CONST METER_min				= 0x18;
			CONST METER_optimum			= 0x19;
			CONST METER_value			= 0x1A;
		#::
		
		#:Object:
			CONST OBJECT_data			= 0x14;
			CONST OBJECT_form			= 0x15;
			CONST OBJECT_height			= 0x16;
			CONST OBJECT_name			= 0x17;
			CONST OBJECT_type			= 0x18;
			CONST OBJECT_useMap			= 0x19;
			CONST OBJECT_width			= 0x1A;
		#::
		
		#:Ol:
			CONST OL_reversed			= 0x14;
			CONST OL_start				= 0x15;
			CONST OL_type				= 0x16;
		#::
		
		#:Optgroup:
			CONST OPTGROUP_disabled			= 0x14;
			CONST OPTGROUP_label			= 0x15;
		#::
		
		#:Option:
			CONST OPTION_disabled			= 0x14;
			CONST OPTION_label			= 0x15;
			CONST OPTION_selected			= 0x16;
			CONST OPTION_value			= 0x17;
		#::
		
		#:Output:
			CONST OUTPUT_for			= 0x14;
			CONST OUTPUT_form			= 0x15;
			CONST OUTPUT_name			= 0x16;
		#::
		
		#:Param:
			CONST PARAM_name			= 0x14;
			CONST PARAM_value			= 0x15;
		#::
		
		#:Progress:
			CONST PROGRESS_max			= 0x14;
			CONST PROGRESS_value			= 0x15;
		#::
		
		#:Q:
			CONST Q_cite				= 0x14;
		#::
		
		#:Script:
			CONST SCRIPT_async			= 0x14;
			CONST SCRIPT_src			= 0x15;
			CONST SCRIPT_type			= 0x16;
			CONST SCRIPT_defer			= 0x17;
		#::
		
		#:Select:
			CONST SELECT_autoFocus			= 0x14;
			CONST SELECT_disabled			= 0x15;
			CONST SELECT_form			= 0x16;
			CONST SELECT_multiple			= 0x17;
			CONST SELECT_selectedIndex		= 0x18;
			CONST SELECT_name			= 0x19;
			CONST SELECT_required			= 0x1A;
			CONST SELECT_size			= 0x1B;
		#::
		
		#:Source:
			CONST SOURCE_media			= 0x14;
			CONST SOURCE_src			= 0x15;
			CONST SOURCE_type			= 0x16;
		#::
		
		#:Style:
			CONST STYLE_disabled			= 0x14;
			CONST STYLE_media			= 0x15;
			CONST STYLE_scoped			= 0x16;
			CONST STYLE_title			= 0x17;
			CONST STYLE_type			= 0x18;
		#::
		
		#:Td:
			CONST TD_colspan			= 0x14;
			CONST TD_headers			= 0x15;
			CONST TD_rowspan			= 0x16;
		#::
		
		#:Textarea:
			CONST TEXTAREA_autoFocus		= 0x14;
			CONST TEXTAREA_cols			= 0x15;
			CONST TEXTAREA_disabled			= 0x16;
			CONST TEXTAREA_form			= 0x17;
			CONST TEXTAREA_maxLength		= 0x18;
			CONST TEXTAREA_name			= 0x19;
			CONST TEXTAREA_placeHolder		= 0x1A;
			CONST TEXTAREA_readOnly			= 0x1B;
			CONST TEXTAREA_required			= 0x1C;
			CONST TEXTAREA_rows			= 0x1D;
			CONST TEXTAREA_selectionDirection	= 0x1E;
			CONST TEXTAREA_selectionEnd		= 0x1F;
			CONST TEXTAREA_selectionStart		= 0x20;
			CONST TEXTAREA_wrap			= 0x21;
		#::
		
		#:Th:
			CONST TH_abbr				= 0x14;
			CONST TH_axis				= 0x15;
			CONST TH_colspan			= 0x16;
			CONST TH_headers			= 0x17;
			CONST TH_rowspan			= 0x18;
			CONST TH_scope				= 0x19;
		#::
		
		#:Time:
			CONST TIME_dateTime			= 0x14;
			CONST TIME_pubDate			= 0x15;
		#::
		
		#:Track:
			CONST TRACK_default			= 0x14;
			CONST TRACK_kind			= 0x15;
			CONST TRACK_label			= 0x16;
			CONST TRACK_src				= 0x17;
			CONST TRACK_srcLang			= 0x18;
		#::
		
		#:Video:
			CONST VIDEO_autoPlay			= 0x14;
			CONST VIDEO_buffered			= 0x15;
			CONST VIDEO_controls			= 0x16;
			CONST VIDEO_crossOrigin			= 0x17;
			CONST VIDEO_height			= 0x18;
			CONST VIDEO_loop			= 0x19;
			CONST VIDEO_muted			= 0x1A;
			CONST VIDEO_played			= 0x1B;
			CONST VIDEO_preload			= 0x1C;
			CONST VIDEO_poster			= 0x1D;
			CONST VIDEO_src				= 0x1E;
			CONST VIDEO_width			= 0x1F;
		#::
	}