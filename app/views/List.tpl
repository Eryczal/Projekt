{extends file="main_temp.tpl"}

{block name=sidebar}
    <li class="sidebar-item">
        <a class="sidebar-link" href="{url action='profile'}">
            <i class="mdi mdi-home"></i>
            <span class="sidebar-text">Mój profil</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link active-link" href="{url action='lists'}">
            <i class="mdi mdi-file-document-multiple-outline"></i>
            <span class="sidebar-text">Moje listy</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link" href="{url action='settings'}">
            <i class="mdi mdi-cog"></i>
            <span class="sidebar-text">Ustawienia</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link" href="{url action='logout'}">
            <i class="mdi mdi-logout"></i>
            <span class="sidebar-text">Wyloguj</span>
        </a>
    </li>
    <hr style="margin-top:30px">
    <p>Zalogowano jako: {$role}</p>
    {if $role eq "Administrator"}
        <hr style="margin-bottom:30px">
        <p style="margin-bottom: 0">Panel administratora:</p>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{url action='adminpanel'}">
                <i class="mdi mdi-cogs"></i>
                <span class="sidebar-text">Zarządzanie</span>
            </a>
        </li>
    {/if}
{/block}

{block name=page}
        {foreach $msgs->getMessages() as $msg}
            <div class="alert {if $msg->isInfo()}alert-success{/if}
                {if $msg->isWarning()}alert-warning{/if}
                {if $msg->isError()}alert-danger{/if}" role="alert">
                {$msg->text}
            </div>
        {/foreach}
        {if $list neq "error"}
            <div class="edit_container">
                <div id="name_{$list[0]['id']}" class="list_header ib editable">{$list[0]["name"]}</div>
                <i onclick="editList('name', {$list[0]['id']})" class="edit-button list_header mdi mdi-pencil-outline"></i>
                <div id="name_eb_{$list[0]['id']}" class="editButtons"></div>
            </div>
            <div class="edit_container">
                <div id="description_{$list[0]['id']}" class="ib editable">{$list[0]["description"]}</div>
                <i onclick="editList('description', {$list[0]['id']})" class="edit-button mdi mdi-pencil-outline"></i>
                <div id="description_eb_{$list[0]['id']}" class="editButtons"></div>
            </div>
            <div class="edit_container">
                <div class="ib editable">Priorytet: <div id="priority_{$list[0]['id']}" class="ib">{$list[0]["priority"]}</div></div>
                <i onclick="editList('priority', {$list[0]['id']})" class="edit-button mdi mdi-pencil-outline"></i>
                <div id="priority_eb_{$list[0]['id']}" class="editButtons"></div>
            </div>
            
            <div id="list_tasks">
                {if $tasks != 1 && count((array)$tasks) > 0}
                    {foreach $tasks as $key=>$task}
                        <div class="task" id="ptask_{$task['id']}">
                            <div class="task_container">
                                <div class="edit_task_position" id="etask_{$task['id']}" ondrop="dropTask(event)" ondragover="dragOverTask(event)">
                                    <i id="{$task['id']}" draggable="true" ondragstart="dragTask(event)" class="mdi mdi-arrow-all t_u_class"></i>
                                </div>
                                <div class="remove_task" id="rtask_{$task['id']}">
                                    <i id="r_{$task['id']}" onclick="removeTask({$task['id']})" class="mdi mdi-delete-forever"></i>
                                </div>
                                <div class="task_priority">
                                    <div class="edit_container">
                                        <div class="ib editable">Priorytet: <div id="taskpriority_{$task['id']}" class="ib">{$task["priority"]}</div></div>
                                        <i onclick="editList('taskpriority', {$task['id']})" class="edit-button mdi mdi-pencil-outline"></i>
                                        <div id="taskpriority_eb_{$task['id']}" class="editButtons"></div>
                                    </div>
                                </div>
                                <div class="task_info">
                                    <div class="edit_container">
                                        <div id="taskname_{$task['id']}" class="ib editable taskname">{$task['name']}</div>
                                        <i onclick="editList('taskname', {$task['id']})" class="edit-button mdi mdi-pencil-outline"></i>
                                        <div id="taskname_eb_{$task['id']}" class="editButtons"></div>
                                    </div>
                                    <div class="edit_container">
                                        <div id="taskdescription_{$task['id']}" class="ib editable">{$task['description']}</div>
                                        <i onclick="editList('taskdescription', {$task['id']})" class="edit-button mdi mdi-pencil-outline"></i>
                                        <div id="taskdescription_eb_{$task['id']}" class="editButtons"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="steps" id="steps_{$task['id']}">
                                {if $steps[$key] != 1 && count((array)$steps[$key]) > 0}
                                    {foreach $steps[$key] as $step}
                                        <div class="step" id="step_{$step['id']}">
                                            <div class="step_container">
                                                <div class="edit_step_position" id="estep_{$step['id']}" ondrop="dropStep(event)" ondragover="dragOverStep(event)">
                                                    <i id="s{$step['id']}" draggable="true" ondragstart="dragStep(event)" class="mdi mdi-arrow-all s_u_class"></i>
                                                </div>
                                                <div class="remove_step" id="rstep_{$step['id']}">
                                                    <i id="rs_{$step['id']}" onclick="removeStep({$step['id']})" class="mdi mdi-delete-forever"></i>
                                                </div>
                                                <div class="step_priority">
                                                    <div class="edit_container">
                                                        <div class="ib editable">Priorytet: <div id="steppriority_{$step['id']}" class="ib">{$step["priority"]}</div></div>
                                                        <i onclick="editList('steppriority', {$step['id']})" class="edit-button mdi mdi-pencil-outline"></i>
                                                        <div id="steppriority_eb_{$step['id']}" class="editButtons"></div>
                                                    </div>
                                                </div>
                                                <div class="step_info">
                                                    <div class="edit_container">
                                                        <div id="stepname_{$step['id']}" class="ib editable stepname {if $step['completion']}completed_step{/if}">{$step['name']}</div>
                                                        <i onclick="editList('stepname', {$step['id']})" class="edit-button mdi mdi-pencil-outline"></i>
                                                        <div id="stepname_eb_{$step['id']}" class="editButtons"></div>
                                                    </div>
                                                    <div class="edit_container">
                                                        <div id="stepdescription_{$step['id']}" class="ib editable {if $step['completion']}completed_step{/if}">{$step['description']}</div>
                                                        <i onclick="editList('stepdescription', {$step['id']})" class="edit-button mdi mdi-pencil-outline"></i>
                                                        <div id="stepdescription_eb_{$step['id']}" class="editButtons"></div>
                                                    </div>
                                                </div>
                                                <div class="step_completion">
                                                    <input type="checkbox" id="completion_{$step['id']}" class="step_checkbox" onclick="changeCompletion({$step['id']})" {if $step['completion']}checked{/if}>
                                                </div>
                                            </div>
                                        </div>
                                    {/foreach}
                                {else}
                                    <p id="e_t_s_{$task['id']}">W tym zadaniu nie ma jeszcze żadnych kroków.</p>
                                {/if}
                            </div>
                            <input type="button" onclick="addStep({$task['id']})" class="addButton aS" value="Dodaj krok">
                        </div>
                    {/foreach}
                {else}
                    <p id="e_l_t">Lista nie ma jeszcze żadnych zadań.</p>
                {/if}
            </div>
            <input type="button" id="addTask" class="addButton" value="Dodaj zadanie">
            <script src="{$conf->app_url}/js/list.js"></script>
        {else}
            <a href="{$conf->app_url}/lists">Wróć do przeglądania Twoich list</a>
        {/if}
{/block}