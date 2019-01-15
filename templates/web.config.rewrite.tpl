		<rule name="Rewrite latest REAL_FILENAME" stopProcessing="true">
                    <match url="^downloads/releases/latest/FAKE_FILENAME$" />
                    <action type="Rewrite" url="/downloads/releases/REAL_FILENAME" appendQueryString="false" />
                </rule>
