<?php 

function getLanguages() {
	return \App\Models\Language::active()->Selection()->get();
}

function get_default_lang() {
	return Config::get('app.locale');
}