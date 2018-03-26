<?php

namespace Runsite\CMF\Http\Controllers;

use Illuminate\Http\Request;
use Runsite\CMF\Http\Controllers\BaseAdminController;
use Runsite\CMF\Models\Model\Model;

class BootController extends BaseAdminController
{
	public function show(Request $request)
	{
		$model = Model::where('name', 'item')->first();
		$theme = null;
		$gender = null;
		$birthday_place = null;
		$live_place = null;
		$language = null;
		$participation = null;
		$keywords = null;
		$file_type = null;

		$items = M('item')->select('item.name', 'item.interviewer_id', 'item.date_of_creation', 'item.node_id', 'item.language_id', 'item.is_active');

		if($request->theme_id)
		{
			$items->join('rs_node_relations', 'rs_nodes.id', '=', 'rs_node_relations.node_id')->where('rs_node_relations.language_id', 1)->where('rs_node_relations.related_node_id', $request->theme_id);

			$theme = M('theme')->where('rs_nodes.id', $request->theme_id)->first();
		}

		if($request->date_of_creation)
		{
			$items->where('date_of_creation', 'like', '%'.$request->date_of_creation.'%');
		}

		if($request->name)
		{
			$speakers = M('speaker')->where('name', 'like', '%'.$request->name.'%')->get();

			$items->join('rs_node_relations as speaker_name_relations', 'rs_nodes.id', '=', 'speaker_name_relations.node_id')->where('speaker_name_relations.language_id', 1)->whereIn('speaker_name_relations.related_node_id', $speakers->pluck('node_id'));
		}

		if($request->nickname)
		{
			$speakers = M('speaker')->where('nickname', 'like', '%'.$request->nickname.'%')->get();

			$items->join('rs_node_relations as speaker_nickname_relations', 'rs_nodes.id', '=', 'speaker_nickname_relations.node_id')->where('speaker_nickname_relations.language_id', 1)->whereIn('speaker_nickname_relations.related_node_id', $speakers->pluck('node_id'));
		}

		if($request->gender_id)
		{
			$speakers = M('speaker')->where('gender_id', $request->gender_id)->get();

			$items->join('rs_node_relations as speaker_gender_relations', 'rs_nodes.id', '=', 'speaker_gender_relations.node_id')->where('speaker_gender_relations.language_id', 1)->whereIn('speaker_gender_relations.related_node_id', $speakers->pluck('node_id'));

			$gender = M('gender')->where('rs_nodes.id', $request->gender_id)->first();
		}

		if($request->birthday_place_id)
		{
			$speakers = M('speaker')->where('birthday_place_id', $request->birthday_place_id)->get();

			$items->join('rs_node_relations as speaker_birthday_relations', 'rs_nodes.id', '=', 'speaker_birthday_relations.node_id')->where('speaker_birthday_relations.language_id', 1)->whereIn('speaker_birthday_relations.related_node_id', $speakers->pluck('node_id'));

			$birthday_place = M('birthday_place')->where('rs_nodes.id', $request->birthday_place_id)->first();
		}

		if($request->live_places)
		{
			$speakers = M('speaker')->join('rs_node_relations as pre_speaker_live_places_relations', 'rs_nodes.id', '=', 'pre_speaker_live_places_relations.node_id')->where('pre_speaker_live_places_relations.language_id', 1)->where('pre_speaker_live_places_relations.related_node_id', $request->live_places)->get();

			$items->join('rs_node_relations as speaker_live_places_relations', 'rs_nodes.id', '=', 'speaker_live_places_relations.node_id')->where('speaker_live_places_relations.language_id', 1)->whereIn('speaker_live_places_relations.related_node_id', $speakers->pluck('node_id'));

			$live_place = M('live_place')->where('rs_nodes.id', $request->live_places)->first();
		}

		if($request->birthday)
		{
			$speakers = M('speaker')->where('birthday', 'like', '%'.$request->birthday.'%')->get();

			$items->join('rs_node_relations as speaker_birthday_relations', 'rs_nodes.id', '=', 'speaker_birthday_relations.node_id')->where('speaker_birthday_relations.language_id', 1)->whereIn('speaker_birthday_relations.related_node_id', $speakers->pluck('node_id'));
		}

		if($request->languages)
		{
			$speakers = M('speaker')->join('rs_node_relations as pre_speaker_languages_relations', 'rs_nodes.id', '=', 'pre_speaker_languages_relations.node_id')->where('pre_speaker_languages_relations.language_id', 1)->where('pre_speaker_languages_relations.related_node_id', $request->languages)->get();

			$items->join('rs_node_relations as speaker_languages_relations', 'rs_nodes.id', '=', 'speaker_languages_relations.node_id')->where('speaker_languages_relations.language_id', 1)->whereIn('speaker_languages_relations.related_node_id', $speakers->pluck('node_id'));

			$language = M('language')->where('rs_nodes.id', $request->languages)->first();
		}

		if($request->participations)
		{
			$speakers = M('speaker')->join('rs_node_relations as pre_speaker_participations_relations', 'rs_nodes.id', '=', 'pre_speaker_participations_relations.node_id')->where('pre_speaker_participations_relations.language_id', 1)->where('pre_speaker_participations_relations.related_node_id', $request->participations)->get();

			$items->join('rs_node_relations as speaker_participations_relations', 'rs_nodes.id', '=', 'speaker_participations_relations.node_id')->where('speaker_participations_relations.language_id', 1)->whereIn('speaker_participations_relations.related_node_id', $speakers->pluck('node_id'));

			$participation = M('participation')->where('rs_nodes.id', $request->participations)->first();
		}

		if($request->keywords)
		{

			$items->join('rs_node_relations as item_keywords_relations', 'rs_nodes.id', '=', 'item_keywords_relations.node_id')->where('item_keywords_relations.language_id', 1)->whereIn('item_keywords_relations.related_node_id', $request->keywords);

			$keywords = M('keyword')->whereIn('rs_nodes.id', $request->keywords)->get();
		}

		if($request->file_type_id)
		{
			$items->join('rs_nodes as file_nodes', 'rs_nodes.id', '=', 'file_nodes.parent_id')
				->join('file', 'file.node_id', '=', 'file_nodes.id')
				->where('file.file_type_id', $request->file_type_id);

			$file_type = M('file_type')->where('node_id', $request->file_type_id)->first();
		}


		$items = $items->paginate();

		return view('runsite::boot', compact('items', 'model', 'theme', 'gender', 'birthday_place', 'live_place', 'language', 'participation', 'keywords', 'file_type'));
	}
}
