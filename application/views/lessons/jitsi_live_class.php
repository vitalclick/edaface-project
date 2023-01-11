<div id="jitsiMeet"></div>
<script src="<?php echo base_url('assets/backend/js/jquery-3.3.1.min.js'); ?>" charset="utf-8"></script>
<script src="<?php echo base_url('assets/global/jitsi/jitsi.js'); ?>"></script>

<!-- check moderator or student -->
<?php if($this->session->userdata('user_id') == $course_details['user_id'] || $this->session->userdata('role_id') == 1): ?>
    <script type="text/javascript">
    	const domain = 'meet.jit.si';
    	const options = {
    	    roomName: '<?php echo $live_class_details['jitsi_meeting_id']; ?>',
    	    width: '100%',
    	    height: '100%',
    	    parentNode: document.querySelector('#jitsiMeet'),
    	    devices: {
    	        audioInput: '<deviceLabel>',
    	        audioOutput: '<deviceLabel>',
    	        videoInput: '<deviceLabel>'
    	    },
    	    configOverwrite: {
                startWithAudioMuted: true,
                startWithVideoMuted: true,
                prejoinPageEnabled: false,
                remoteVideoMenu: 
                {
                    disableKick: false,
                },
                disableRemoteMute: false,
                toolbarButtons: [
                   'camera',
                   'chat',
                   'closedcaptions',
                   'desktop',
                   'download',
                   'embedmeeting',
                   'etherpad',
                   'feedback',
                   'filmstrip',
                   'fullscreen',
                   'hangup',
                   'help',
                   'invite',
                   'livestreaming',
                   'microphone',
                   'mute-everyone',
                   'mute-video-everyone',
                   'participants-pane',
                   'profile',
                   'raisehand',
                   'recording',
                   'security',
                   'select-background',
                   'settings',
                   'shareaudio',
                   'sharedvideo',
                   'shortcuts',
                   'stats',
                   'tileview',
                   'toggle-camera',
                   'videoquality',
                   '__end'
                ],
            },
            videoInputerfaceConfigOverwrite: { DISABLE_DOMINANT_SPEAKER_INDICATOR: true },
            userInfo: {
                moderator: true,
                email: '<?php echo $logged_user_details['email']; ?>',
                displayName: '<?php echo $logged_user_details['first_name'].' '.$logged_user_details['last_name']; ?>'
            }

    	};
    	var api = new JitsiMeetExternalAPI(domain, options);
    	
    	// set new password for channel
        api.addEventListener('participantRoleChanged', function(event) {
            if (event.role === "moderator") {
                api.executeCommand('password', '<?php echo $live_class_details['jitsi_meeting_password']; ?>');
            }
        });

        api.executeCommand('subject', '<?php echo $live_class_details['class_topic']; ?>');

        api.on('readyToClose', () => {
            window.close();
        });
    </script>
<?php else: ?>
    <script type="text/javascript">
        const domain = 'meet.jit.si';
        const options = {
            roomName: '<?php echo $live_class_details['jitsi_meeting_id']; ?>',
            width: '100%',
            height: '100%',
            parentNode: document.querySelector('#jitsiMeet'),
            devices: {
                audioInput: '<deviceLabel>',
                audioOutput: '<deviceLabel>',
                videoInput: '<deviceLabel>'
            },
            configOverwrite: {
                startWithAudioMuted: true,
                startWithVideoMuted: true,
                prejoinPageEnabled: false,
                remoteVideoMenu: 
                {
                    disableKick: true,
                },
                desktopSharingFirefoxDisabled: false,
                desktopSharingChromeDisabled: false,
                disableRemoteMute: true,
                disableInviteFunctions: true,
                toolbarButtons: [
                   'camera',
                   'chat',
                   'desktop',
                   'download',
                   'etherpad',
                   'filmstrip',
                   'fullscreen',
                   'hangup',
                   'livestreaming',
                   'microphone',
                   'participants-pane',
                   'profile',
                   'raisehand',
                   'recording',
                   'select-background',
                   'settings',
                   'shareaudio',
                   'sharedvideo',
                   'shortcuts',
                   'stats',
                   'tileview',
                   'toggle-camera',
                   'videoquality',
                   '__end'
                ]
            },
            videoInputerfaceConfigOverwrite: { DISABLE_DOMINANT_SPEAKER_INDICATOR: true },
            userInfo: {
                moderator: false,
                email: '<?php echo $logged_user_details['email']; ?>',
                displayName: '<?php echo $logged_user_details['first_name'].' '.$logged_user_details['last_name']; ?>'
            }

        };
        var api = new JitsiMeetExternalAPI(domain, options);

        api.executeCommand('subject', '<?php echo $live_class_details['class_topic']; ?>');

        api.on('readyToClose', () => {
            window.close();
        });

    </script>
<?php endif; ?>


<script type="text/javascript">
  //Auto enter the password
  api.on('passwordRequired', function () {
    api.executeCommand('password', '<?php echo $live_class_details['jitsi_meeting_password']; ?>');
  });
</script>