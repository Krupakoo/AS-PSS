{extends file="main.tpl"}

{block name=top}
<div style="margin-bottom: 2em; border-left: 6px solid #1cb841; padding: 1.5em; background: white; border-radius: 0 15px 15px 0; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
    <h1 style="margin:0; color: #2c3e50;">Panel Zarządzania Kursami</h1>
    <p style="color: #7f8c8d; margin-top: 5px;">
        {if $smarty.session.role == 'admin'}
            Panel Administratora - Zarządzanie systemem
        {else}
            Twoje kursy i grupy
        {/if}
    </p>
</div>
{/block}

{block name=bottom}
<div class="pure-g">
    <div class="pure-u-1" style="margin-bottom: 1.5em; display: flex; gap: 10px; flex-wrap: wrap;">
        
        {if $smarty.session.role == 'kursant'}
            <a href="{$conf->action_url}completedCourses" class="pure-button" style="background: #34495e; color: white; border-radius: 5px;">
                <i class="fa fa-archive"></i> Historia i ocenianie ukończonych kursów
            </a>
        {/if}

        {if $smarty.session.role == 'admin'}
            <a href="{$conf->action_url}enrollManage" class="pure-button" style="background: #2c3e50; color: white; border-radius: 5px;">
                <i class="fa fa-users"></i> Zarządzaj zapisami
            </a>
        {/if}
        
        {if $smarty.session.role == 'lektor' || $smarty.session.role == 'admin'}
            <a href="{$conf->action_url}gradeAdd" class="pure-button" style="background: #e67e22; color: white; border-radius: 5px;">
                <i class="fa fa-plus"></i> Wystaw nową ocenę
            </a>
            
            <a href="{$conf->action_url}materialAdd" class="pure-button" style="background: #3498db; color: white; border-radius: 5px;">
                <i class="fa fa-file-upload"></i> Dodaj materiał
            </a>
        {/if}
    </div>

    {if count($courses) > 0}
        {foreach $courses as $c}
            <div class="pure-u-1 pure-u-md-1-2">
                <div style="margin: 10px; padding: 20px; background: white; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); border-top: 4px solid #1cb841;">
                    <h3 style="margin-top:0; color: #1cb841;">{$c['nazwa']}</h3>
                    
                    <p style="font-size: 0.9em; color: #666;">Status: <strong>{$c['status']|default:'aktywny'}</strong></p>

                    <div style="display: flex; gap: 10px; margin-top: 15px; flex-wrap: wrap;">
                        <a href="{$conf->action_url}courseMaterials/{$c['id_kursu']}" class="pure-button" style="background: #f39c12; color: white; border-radius: 5px;">
                            <i class="fa fa-folder-open"></i> Materiały
                        </a>

                        {* PRZYCISK OPINII - Widoczny dla Lektora i Admina *}
                        {if $smarty.session.role == 'lektor' || $smarty.session.role == 'admin'}
                            <a href="{$conf->action_url}courseOpinions/{$c['id_kursu']}" class="pure-button" style="background: #9b59b6; color: white; border-radius: 5px;">
                                <i class="fa fa-comments"></i> Opinie
                            </a>
                        {/if}
                        
                        {if $smarty.session.role == 'kursant' && isset($c['id_zapisu'])}
                            <a href="{$conf->action_url}courseFinish/{$c['id_zapisu']}" 
                               class="pure-button" 
                               style="background: #d35400; color: white; border-radius: 5px;"
                               onclick="return confirm('Czy na pewno chcesz zakończyć ten kurs?')">
                                <i class="fa fa-check"></i> Zakończ kurs
                            </a>
                        {/if}

                        {if $smarty.session.role == 'admin'}
                            <a href="{$conf->action_url}courseEdit/{$c['id_kursu']}" class="pure-button" style="background: #34495e; color: white; border-radius: 5px;">
                                <i class="fa fa-edit"></i> Edytuj
                            </a>
                        {/if}
                    </div>
                </div>
            </div>
        {/foreach}
    {else}
        <div class="pure-u-1">
            <div class="msg info">Brak aktywnych kursów do wyświetlenia.</div>
        </div>
    {/if}
</div>
{/block}