<?php namespace Ixudra\Toggl\Traits;


use stdClass;

trait ProjectTrait {

    /**
     * Get projects visible to user
     *
     * @return  stdClass
     */
    public function projects()
    {
        return $this->sendGetMessage( $this->baseUrl .'/v8/projects' );
    }

    /**
     * Summary report returns the aggregated time entries data
     *
     * @param   array       $data       Data payload that is to be sent with the request
     * @return  stdClass
     */
    public function createProject(array $data = array())
    {
        $data[ 'wid' ] = $this->workspaceId;
        $requestData = array(
            'project'        => $data
        );

        return $this->sendPostMessage( $this->baseUrl .'/v8/projects', $requestData );
    }

    /**
     * Summary report returns the aggregated time entries data
     *
     * @param   integer     $id         ID of the project
     * @return  stdClass
     */
    public function project($id)
    {
        return $this->sendGetMessage( $this->baseUrl .'/v8/projects/'. $id );
    }

    /**
     * Update a project
     *
     * @param   integer     $id         ID of the project
     * @param   array       $data       Data payload that is to be sent with the request
     * @return  stdClass
     */
    public function updateProject($id, array $data = array())
    {
        $requestData = array(
            'project'        => $data
        );

        return $this->sendPutMessage( $this->baseUrl .'/v8/projects/'. $id, $requestData );
    }

    /**
     * Delete a project
     *
     * @param   integer     $id         ID of the project
     * @return  stdClass
     */
    public function deleteProject($id)
    {
        return $this->sendDeleteMessage( $this->baseUrl .'/v8/projects/'. $id );
    }

    /**
     * Get project users
     *
     * @param   integer     $id         ID of the project
     * @param   array       $data       Data payload that is to be sent with the request
     * @return  stdClass
     */
    public function projectUsers($id, array $data = array())
    {
        return $this->sendGetMessage( $this->baseUrl .'/v8/projects/'. $id .'/project_users', $data );
    }

    /**
     * Get project tasks
     *
     * @param   integer     $id         ID of the project
     * @param   array       $data       Data payload that is to be sent with the request
     * @return  stdClass
     */
    public function projectTasks($id, array $data = array())
    {
        return $this->sendGetMessage( $this->baseUrl .'/v8/projects/'. $id .'/tasks', $data );
    }

}
