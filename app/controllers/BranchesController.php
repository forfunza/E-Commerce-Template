<?php

class BranchesController extends \AdminController {

	/**
	 * Display a listing of branches
	 *
	 * @return Response
	 */
	public function index()
	{
		$branches = Branch::all();

		$view = array(
			'branches' => $branches
			);

		return $this->theme->scope('branches.index', $view)->render();
	}

	/**
	 * Show the form for creating a new branch
	 *
	 * @return Response
	 */
	public function create()
	{
		return $this->theme->scope('branches.create')->render();
	}

	/**
	 * Store a newly created branch in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Branch::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Branch::create($data);

		return Redirect::action('BranchesController@index')->with('message','');
	}

	/**
	 * Display the specified branch.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$branch = Branch::findOrFail($id);

		return $this->theme->scope('branches.show', $branches)->render();
	}

	/**
	 * Show the form for editing the specified branch.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$branch = Branch::find($id);

		$view = array(
			'branch' => $branch
			);
		
		return $this->theme->scope('branches.edit', $view)->render();
	}

	/**
	 * Update the specified branch in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$branch = Branch::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Branch::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$branch->update($data);

		return Redirect::action('BranchesController@index')->with('message','');
	}

	/**
	 * Remove the specified branch from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Branch::destroy($id);

		return Redirect::action('BranchesController@index')->with('message','');
	}

}
